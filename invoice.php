<?php
require('fpdf/fpdf.php');

session_start();

// Ensure the orderID is passed via the URL
if (!isset($_GET['orderID'])) {
    die("Order ID not provided!");
}

$orderID = $_GET['orderID'];
$file_path = 'orders.json';

if (!file_exists($file_path)) {
    die("Order file does not exist!");
}

$orders = json_decode(file_get_contents($file_path), true);

// Check if the orders were successfully decoded
if ($orders === null) {
    die("Error reading orders file.");
}

$order = null;
foreach ($orders as $o) {
    // Ensure the id is compared correctly
    if (isset($o['id']) && (string)$o['id'] == $orderID) {
        $order = $o;
        break;
    }
}

if (!$order) {
    die("Order not found!");
}

// Create a new PDF instance
$pdf = new FPDF();
$pdf->AddPage();

// Add the invoice header
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Invoice');

// Add order details
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 10, 'Name: ' . $order['name']);
$pdf->Ln();
$pdf->Cell(40, 10, 'Phone: ' . $order['phone']);
$pdf->Ln();
$pdf->Cell(40, 10, 'Address: ' . $order['address']);
$pdf->Ln();
$pdf->Cell(40, 10, 'City: ' . $order['city']);
$pdf->Ln();
$pdf->Cell(40, 10, 'Country: ' . $order['country']);
$pdf->Ln();
$pdf->Cell(40, 10, 'Date: ' . $order['orderDate']);
$pdf->Ln();
$pdf->Ln();

// Add product details
$pdf->Cell(40, 10, 'Products:');
$pdf->Ln();

// Iterate over cart items
foreach ($order['cart'] as $product) {
    if (isset($product['name'], $product['price'], $product['quantity'])) { // Check if product details exist
        $pdf->Cell(40, 10, $product['name'] . ' - ₹' . $product['price'] . ' x ' . $product['quantity']);
        $pdf->Ln();
    }
}

$pdf->Ln();
$pdf->Cell(40, 10, 'Total Quantity: ' . $order['totalQuantity']);
$pdf->Ln();
$pdf->Cell(40, 10, 'Total Price: ₹' . $order['totalPrice']);

// Output the PDF as a download
$pdf->Output('D', 'invoice_' . $orderID . '.pdf');
?>
