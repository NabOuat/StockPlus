<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Facture - Baliseo</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
            background: #F5F7FA;
            padding: 20px;
        }

        .invoice-container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 102, 255, 0.1);
            overflow: hidden;
        }

        .invoice-header {
            background: linear-gradient(135deg, #0066FF 0%, #0052CC 100%);
            color: white;
            padding: 40px;
            text-align: center;
        }

        .invoice-number {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .invoice-date {
            font-size: 14px;
            opacity: 0.9;
        }

        .invoice-body {
            padding: 40px;
        }

        .company-info {
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 2px solid #E8EAED;
        }

        .company-name {
            font-size: 24px;
            font-weight: 700;
            color: #1A1A1A;
            margin-bottom: 8px;
        }

        .company-details {
            font-size: 13px;
            color: #666666;
            line-height: 1.6;
        }

        .invoice-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        .invoice-section-title {
            font-size: 12px;
            font-weight: 700;
            color: #999999;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
        }

        .invoice-section-content {
            font-size: 13px;
            color: #1A1A1A;
            line-height: 1.8;
        }

        .items-table {
            width: 100%;
            margin-bottom: 40px;
            border-collapse: collapse;
        }

        .items-table thead {
            background: #F5F7FA;
            border-bottom: 2px solid #E8EAED;
        }

        .items-table th {
            padding: 12px;
            text-align: left;
            font-size: 12px;
            font-weight: 700;
            color: #666666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .items-table td {
            padding: 12px;
            border-bottom: 1px solid #E8EAED;
            font-size: 13px;
            color: #1A1A1A;
        }

        .items-table tbody tr:last-child td {
            border-bottom: none;
        }

        .text-right {
            text-align: right;
        }

        .summary-section {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 40px;
        }

        .summary {
            width: 300px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            font-size: 13px;
            border-bottom: 1px solid #E8EAED;
        }

        .summary-row.total {
            border-bottom: 2px solid #0066FF;
            padding: 15px 0;
            font-size: 16px;
            font-weight: 700;
            color: #1A1A1A;
        }

        .summary-label {
            color: #666666;
        }

        .summary-value {
            font-weight: 600;
            color: #1A1A1A;
        }

        .payment-info {
            background: #F0F4FF;
            border-left: 4px solid #0066FF;
            padding: 16px;
            margin-bottom: 40px;
            border-radius: 6px;
        }

        .payment-info-title {
            font-size: 12px;
            font-weight: 700;
            color: #0066FF;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .payment-info-content {
            font-size: 13px;
            color: #1A1A1A;
        }

        .payment-method-icon {
            display: inline-block;
            width: 24px;
            height: 24px;
            background: #0066FF;
            border-radius: 50%;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 8px;
            font-size: 12px;
        }

        .invoice-footer {
            background: #F5F7FA;
            padding: 20px 40px;
            text-align: center;
            font-size: 12px;
            color: #999999;
            border-top: 1px solid #E8EAED;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
            justify-content: center;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Instrument Sans', sans-serif;
        }

        .btn-primary {
            background: linear-gradient(135deg, #0066FF 0%, #0052CC 100%);
            color: white;
        }

        .btn-primary:hover {
            box-shadow: 0 8px 24px rgba(0, 102, 255, 0.3);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: white;
            color: #0066FF;
            border: 1px solid #0066FF;
        }

        .btn-secondary:hover {
            background: #F0F4FF;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .action-buttons {
                display: none;
            }

            .invoice-container {
                box-shadow: none;
            }
        }

        @media (max-width: 768px) {
            .invoice-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .invoice-body {
                padding: 20px;
            }

            .summary {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <!-- Header -->
        <div class="invoice-header">
            <div class="invoice-number">FACTURE #{{ $invoice['number'] }}</div>
            <div class="invoice-date">Date: {{ $invoice['date'] }}</div>
        </div>

        <!-- Body -->
        <div class="invoice-body">
            <!-- Company Info -->
            <div class="company-info">
                <div class="company-name">StockPlus S.A.R.L</div>
                <div class="company-details">
                    10 Rue du Commerce<br>
                    75000 Paris, France<br>
                    Tél: +33 1 23 45 67 89<br>
                    Email: contact@stockplus.fr
                </div>
            </div>

            <!-- Client & Invoice Info -->
            <div class="invoice-grid">
                <div>
                    <div class="invoice-section-title">Facturé à:</div>
                    <div class="invoice-section-content">
                        <strong>{{ $invoice['client']['name'] }}</strong><br>
                        {{ $invoice['client']['address'] }}<br>
                        {{ $invoice['client']['phone'] }}
                    </div>
                </div>
                <div>
                    <div class="invoice-section-title">Détails de la facture:</div>
                    <div class="invoice-section-content">
                        <strong>Numéro:</strong> {{ $invoice['number'] }}<br>
                        <strong>Date:</strong> {{ $invoice['date'] }}<br>
                        <strong>Statut:</strong> <span style="color: #27AE60; font-weight: 600;">Payée</span>
                    </div>
                </div>
            </div>

            <!-- Items Table -->
            <table class="items-table">
                <thead>
                    <tr>
                        <th>Article</th>
                        <th class="text-right">Qté</th>
                        <th class="text-right">Prix unit.</th>
                        <th class="text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoice['items'] as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td class="text-right">{{ $item['quantity'] }}</td>
                        <td class="text-right">{{ number_format($item['price'], 2, ',', ' ') }} €</td>
                        <td class="text-right"><strong>{{ number_format($item['total'], 2, ',', ' ') }} €</strong></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Summary -->
            <div class="summary-section">
                <div class="summary">
                    <div class="summary-row">
                        <span class="summary-label">Sous-total:</span>
                        <span class="summary-value">{{ number_format($invoice['subtotal'], 2, ',', ' ') }} €</span>
                    </div>
                    @if($invoice['discount'] > 0)
                    <div class="summary-row">
                        <span class="summary-label">Remise ({{ $invoice['discount_percent'] }}%):</span>
                        <span class="summary-value" style="color: #27AE60;">-{{ number_format($invoice['discount'], 2, ',', ' ') }} €</span>
                    </div>
                    @endif
                    <div class="summary-row">
                        <span class="summary-label">Taxes (10%):</span>
                        <span class="summary-value">{{ number_format($invoice['taxes'], 2, ',', ' ') }} €</span>
                    </div>
                    <div class="summary-row total">
                        <span>TOTAL:</span>
                        <span>{{ number_format($invoice['total'], 2, ',', ' ') }} €</span>
                    </div>
                </div>
            </div>

            <!-- Payment Info -->
            <div class="payment-info">
                <div class="payment-info-title">
                    <i class="fas fa-check-circle"></i> Informations de paiement
                </div>
                <div class="payment-info-content">
                    <div style="margin-bottom: 8px;">
                        <strong>Méthode:</strong>
                        <span style="display: inline-block; margin-left: 8px;">
                            @if($invoice['payment_method'] === 'card')
                                <i class="fas fa-credit-card"></i> Carte de crédit/débit
                            @elseif($invoice['payment_method'] === 'cash')
                                <i class="fas fa-money-bill"></i> Espèces
                            @elseif($invoice['payment_method'] === 'check')
                                <i class="fas fa-receipt"></i> Chèque
                            @elseif($invoice['payment_method'] === 'transfer')
                                <i class="fas fa-exchange-alt"></i> Virement
                            @endif
                        </span>
                    </div>
                    
                    @if($invoice['payment_method'] === 'cash' && isset($invoice['cash_payment']))
                    <div style="margin-bottom: 8px; padding-top: 8px; border-top: 1px solid rgba(0, 102, 255, 0.2);">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 4px;">
                            <span>Montant reçu:</span>
                            <strong>{{ number_format($invoice['cash_payment']['amount_received'], 2, ',', ' ') }} €</strong>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <span>Monnaie à rendre:</span>
                            <strong style="color: #27AE60;">{{ number_format($invoice['cash_payment']['change'], 2, ',', ' ') }} €</strong>
                        </div>
                    </div>
                    @endif
                    
                    <div>
                        <strong>Statut:</strong> <span style="color: #27AE60; font-weight: 600;">Payée</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="invoice-footer">
            <p>Merci pour votre commande!</p>
            <p style="margin-top: 8px;">© 2025 StockPlus. Tous droits réservés.</p>
            <div class="action-buttons">
                <button class="btn btn-primary" onclick="window.print()">
                    <i class="fas fa-print"></i> Imprimer
                </button>
                <button class="btn btn-secondary" onclick="window.history.back()">
                    <i class="fas fa-arrow-left"></i> Retour
                </button>
            </div>
        </div>
    </div>
</body>
</html>
