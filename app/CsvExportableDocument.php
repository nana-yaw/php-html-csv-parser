<?php
namespace App;

class CsvExportableDocument implements ExportableDocumentInterface
{
    private function formatData(HtmlDocument $document, Util $formatter): array
    {
        $addressDetails = $formatter::formatAddress($document->getAddress());
        $phoneNumber = $formatter::formatPhoneNumber($document->getPhoneNumber());
        
        $data = [
            "Tracking #"      =>  strval(
                $formatter::output($document->getTrackingNumber())
            ),
            "PO #"                => strval(
                $formatter::output($document->getPoNumber())
            ),
            "Scheduled"       => $formatter::formatScheduledDate(
                $document->getScheduledDate()
            ),
            "Customer"       => strval($formatter::output($document->getCustomer())),
            "Trade"       => strval($formatter::output($document->getTrade())),
            "NTE"       => $formatter::formatNte($document->getNte()),
            "Store ID"       => strval($formatter::output($document->getStoreID())),
            "Street"       => $addressDetails["street"],
            "City"       => $addressDetails["city"],
            "State"       => $addressDetails["state"],
            "Zip Code"       => $addressDetails["zip_code"],
            "Phone Number" => strval($phoneNumber)
        ];

        $this->printCsvContent($data);

        return $data;
    }

    private function printCsvContent(array $data): void
    {
        echo nl2br("<h3>CSV Content Below:</h3>\n");
        foreach ($data as $key => $value) {
            echo $key . " : " . $value . nl2br("\r\n");
        }
        echo nl2br("\r\n");
    }

    public function export(HtmlDocument $document, Util $formatter): void
    {
        $csvHeader = [
            "Tracking #", 
            "PO #", 
            "Scheduled", 
            "Customer", 
            "Trade", 
            "NTE",
            "Store ID",
            "Street",
            "City",
            "State",
            "Zip Code",
            "Phone Number",
        ];

        $csvContent = $this->formatData($document, $formatter);

        $csvData = [$csvHeader, $csvContent];

        // Open file in append mode
        $filePath = fopen(__DIR__.'/../wo_export/wo.csv', 'a');
  
        // Append input data to the file
        // Loop through file pointer and a line
        foreach ($csvData as $fields) {
            fputcsv($filePath, $fields);
        }
  
        // close the file
        fclose($filePath);

        echo nl2br("<p>CSV file exported successfully!</p>");
    }
}
?>
