<?php
    require 'PhpSpreadsheet/vendor/autoload.php';
    
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use \PhpOffice\PhpSpreadsheet\IOFactory;
    
    //Crear un archivo
    /*$spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Hello World ghf !');
    $writer = new Xlsx($spreadsheet);
    $writer->save('PhpSpreadsheet/hello world.xlsx');*/
    
    //Abrir un archivo
    //$inputFileName = 'PhpSpreadsheet/formato_contrato.xlsx';
    $inputFileName = 'registro/adminunicab/php/contratos/formato_contrato.xlsx';
    $spreadsheet = IOFactory::load($inputFileName);
    $spreadsheet->setActiveSheetIndex(0); //opcional
    $sheet = $spreadsheet->getActiveSheet();
    //$cell = $sheet->getCell('A1');
    //echo 'Value: ', $cell->getValue(), '; Address: ', $cell->getCoordinate(), PHP_EOL;
    $sheet->setCellValue('C19', 'GREGORY HERNANDO FIGUEREDO GUEVARA');
    
    $writer = new Xlsx($spreadsheet);
    $writer->save('registro/adminunicab/php/contratos/formato_contrato_ghf.xlsx');
    
    //El siguiente block es para habilitar el cuadro de diálogo para grabar el archivo en formato xls
    //###################################################################################
    /*header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="hello world.xls"');
    header('Cache-Control: max-age=0');
    
    $writer = IOFactory::createWriter($spreadsheet, 'Xls');
    $writer->save('php://output');*/
    //###################################################################################
    
    //El siguiente block es para habilitar el cuadro de diálogo para grabar el archivo en formato xlsx
    //###################################################################################
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //header('Content-Disposition: attachment;filename="formato_contrato.xlsx"');
    header('Content-Disposition: attachment;filename="formato_contrato_ghf.xlsx"');
    header('Cache-Control: max-age=0');
    
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    //###################################################################################
    
    

?>