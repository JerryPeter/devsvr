<?php
require_once 'vendor/autoload.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Stimulsoft Reports.PHP - Viewer</title>
    <style>
        html, body {
            font-family: sans-serif;
        }
    </style>

    <?php
    /** https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_deployment.htm */
    $js = new \Stimulsoft\StiJavaScript(\Stimulsoft\StiComponentType::Report);
    $js->renderHtml();
    ?>

    <script type="text/javascript">
        <?php
        $handler = new \Stimulsoft\StiHandler();
        //$handler->license->setKey('6vJhGtLLLz2GNviWmUTrhSqnO...');
        //$handler->license->setFile('license.key');
        $handler->renderHtml();

        /** https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_web_designer_creating_editing_report.htm */
        $report = new \Stimulsoft\Report\StiReport();
        $report->loadFile('reports/SimpleList.mrt');
        $report->render();
        ?>

        function exportOpen() {
            <?php
            $report->exportDocument(\Stimulsoft\StiExportFormat::Pdf, true);
            $report->renderHtml();
            ?>
        }

        function exportDownload() {
            <?php
            $report->exportDocument(\Stimulsoft\StiExportFormat::Pdf);
            $report->renderHtml();
            ?>
        }
    </script>
</head>
<body>
<h2>Stimulsoft Reports.PHP - Export</h2>
<hr><br>
<a href="#" onclick="exportOpen(); return false;">Export PDF and Open</a><br>
<a href="#" onclick="exportDownload(); return false;">Export PDF and Download</a><br>
</body>
</html>
