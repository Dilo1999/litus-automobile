# Contact Form Email Setup

This guide explains how to configure the contact form to send emails.

## What's Already Done

- **ContactFormMail** Mailable class (`app/Mail/ContactFormMail.php`)
- **Email template** (`resources/views/emails/contact-form.blade.php`)
- **ContactController** sends the email to the configured recipient

## Configuration Steps

### Step 1: Add Mail Variables to `.env`

Copy these variables into your `.env` file and adjust the values:

```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-username
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@yourdomain.com"
MAIL_FROM_NAME="${APP_NAME}"
MAIL_CONTACT_RECIPIENT="sales@alzahageneraltrading.com"
```

### Step 2: Choose Your Mail Provider

#### Option A: Gmail (for testing)

1. Enable 2-Step Verification on your Google account
2. Create an [App Password](https://myaccount.google.com/apppasswords)
3. Use these settings:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-gmail@gmail.com
MAIL_PASSWORD=your-16-char-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="your-gmail@gmail.com"
MAIL_FROM_NAME="Al Zaha General Trading"
MAIL_CONTACT_RECIPIENT="sales@alzahageneraltrading.com"
```

#### Option B: Mailtrap (for development/testing)

1. Sign up at [mailtrap.io](https://mailtrap.io)
2. Create an inbox and copy the SMTP credentials
3. Use these settings:

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@alzahageneraltrading.com"
MAIL_FROM_NAME="Al Zaha General Trading"
MAIL_CONTACT_RECIPIENT="sales@alzahageneraltrading.com"
```

#### Option C: Mailpit (local development)

If you use [Mailpit](https://github.com/axllent/mailpit) or Laravel Sail:

```env
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="noreply@alzahageneraltrading.com"
MAIL_FROM_NAME="Al Zaha General Trading"
MAIL_CONTACT_RECIPIENT="sales@alzahageneraltrading.com"
```

#### Option D: Production SMTP (e.g., your domain's mail server)

Use your hosting provider's SMTP settings (cPanel, Plesk, etc.):

```env
MAIL_MAILER=smtp
MAIL_HOST=mail.yourdomain.com
MAIL_PORT=587
MAIL_USERNAME=contact@yourdomain.com
MAIL_PASSWORD=your-mail-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@yourdomain.com"
MAIL_FROM_NAME="Al Zaha General Trading"
MAIL_CONTACT_RECIPIENT="sales@alzahageneraltrading.com"
```

### Step 3: Clear Config Cache (if in production)

```bash
php artisan config:clear
```

### Step 4: Test the Contact Form

1. Visit `/contact` on your site
2. Fill out and submit the form
3. Check the recipient inbox (or Mailtrap/Mailpit inbox for testing)

## Customizing the Recipient

To send contact form submissions to a different email, set `MAIL_CONTACT_RECIPIENT` in `.env`:

```env
MAIL_CONTACT_RECIPIENT="info@yourcompany.com"
```

## Troubleshooting

- **Emails not arriving?** Check spam folder, verify SMTP credentials, and ensure your host allows outbound SMTP
- **Connection timeout?** Some shared hosts block SMTP; use your host's mail relay or a service like Mailgun/SendGrid
- **Gmail "Less secure app" error?** Use an App Password, not your regular password
