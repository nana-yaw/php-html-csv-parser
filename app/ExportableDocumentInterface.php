<?php
namespace App;

interface ExportableDocumentInterface
{
    public function export(HtmlDocument $document, Util $formatter): void;
}
?>