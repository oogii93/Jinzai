<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f0f9ff;">
    <!-- Container -->
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); overflow: hidden;">
        <!-- Header -->
        <div style="background-color: #0ea5e9; padding: 20px; text-align: center;">
            <h2 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: bold;">企業側お問い合わせ</h2>
        </div>

        <!-- Content -->
        <div style="padding: 20px;">
            <p style="margin: 0 0 15px; font-size: 16px; color: #333333;"><strong>企業名:</strong> {{ $data['company_name'] }}</p>
            <p style="margin: 0 0 15px; font-size: 16px; color: #333333;"><strong>担当者名:</strong> {{ $data['manager_name'] }}</p>
            <p style="margin: 0 0 15px; font-size: 16px; color: #333333;"><strong>電話番号:</strong> {{ $data['phone_number'] }}</p>
            <p style="margin: 0 0 15px; font-size: 16px; color: #333333;"><strong>メールアドレス:</strong> {{ $data['mail_address'] }}</p>
            <p style="margin: 0 0 15px; font-size: 16px; color: #333333;"><strong>問い合わせ内容:</strong> {{ $data['message'] }}</p>
        </div>

        <!-- Footer -->
        <div style="background-color: #f0f9ff; padding: 10px; text-align: center;">
            <p style="margin: 0; font-size: 14px; color: #161616;">人材紹介の企業側お問い合わせ</p>
        </div>
    </div>
</body>
</html>
