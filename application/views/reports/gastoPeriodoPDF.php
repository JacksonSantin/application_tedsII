<?php

class PDF extends MY_FPDF
{
  // Colored table
  function FancyTable($header, $data) {
      // Colors, line width and bold font
      $this->SetFillColor(138,177,219);
      // $this->SetFillColor(255,0,0);
      $this->SetTextColor(255);
      $this->SetDrawColor(153,153,153);
      $this->SetLineWidth(.3);
      $this->SetFont('','B');

      // Header
      $w = array(10, 50, 30, 30, 50, 100);
      for($i=0;$i<count($header);$i++)
          $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
      $this->Ln();
      // Color and font restoration
      $this->SetFillColor(224,235,255);
      $this->SetTextColor(0);
      $this->SetFont('');
      // Data
      $fill = false;
      $cont=1;
      foreach($data as $row) {
          $this->Cell($w[0],6,$cont++,'LR', 0,'L',$fill);
          $this->Cell($w[1],6, date('d/m/Y', strtotime($row['outgoing'])),'LR',0,'L',$fill);
          $this->Cell($w[2],6, date('d/m/Y', strtotime($row['outdate'])),'LR',0,'L',$fill);
          $this->Cell($w[3],6,$row['rating'],'LR',0,'R',$fill);
          $this->Cell($w[4],6,utf8_decode($row['place']),'LR',0,'R',$fill);
          $this->Cell($w[5],6,utf8_decode($row['user_cad']),'LR',0,'R',$fill);
          $this->Ln();
          $fill = !$fill;
      }
      // Closing line
      $this->Cell(array_sum($w),0,'','T');
  }
}

  $pdf = new PDF('L');
  // Column headings
  $header = array('#', 'Gasto', 'Data Gasto', 'Valor Gasto', 'Local', utf8_decode('Usuário'));
  // Data loading
  // $data = $pdf->LoadData('countries.txt');
  $pdf->SetFont('Arial','',14);
  $pdf->AliasNbPages();
  $pdf->AddPage();
  $pdf->FancyTable($header,$data);
  $pdf->Output();
?>
