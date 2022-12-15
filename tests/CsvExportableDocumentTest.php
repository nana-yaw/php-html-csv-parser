<?php
use PHPUnit\Framework\TestCase;
use App\HtmlDocument;
use App\Util;
use App\CsvExportableDocument;

class CsvExportableDocumentTest extends TestCase
{
    public function testCsvContent()
    {
        $expectedData = [
            "Tracking #"=> "22222e2222",
            "PO #"=> "11111q1111",
            "Scheduled"=> "2021-07-19 20:10",
            "Customer"=> "My new Customer",
            "Trade"=> "HVAC",
            "NTE"=>1000,
            "Store ID"=> "MNC-123",
            "Street"=> "Main street 123",
            "City"=> "Chicago",
            "State"=> "IL",
            "Zip Code"=> "66562",
            "Phone Number"=> "9991112233"
        ];

        $document = new HtmlDocument(__DIR__."/../wo_for_parse.html");
        $formatter = new Util();

        $csv = new CsvExportableDocument();
        $actualData = $csv->formatData($document, $formatter);

        $this->assertEquals(json_encode($expectedData), json_encode($actualData));
    }
}
?>
