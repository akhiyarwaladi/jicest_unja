# Database Schema Overview

## Main Tables

### Users Table
- Primary authentication table
- Fields: id, name, email, password, role, timestamps
- Roles: 'administrator', 'participant'

### Participants Table  
- Conference participant details
- Belongs to User (foreign key: user_id)
- Related to: UploadAbstract, Payment tables

### Upload Abstracts Table
- Research abstract submissions
- Belongs to Participant
- Contains abstract file uploads and metadata

### Upload Fulltexts Table
- Full paper submissions
- Contains full-text paper uploads

### Payments Table
- Payment records for conference fees
- Belongs to Participant
- Related to DetailPayment for additional payment information

### Detail Payments Table
- Extended payment information
- Contains payment validation details

## Migration Files (Chronological Order)
1. `2014_10_12_000000_create_users_table.php` - User authentication
2. `2014_10_12_100000_create_password_reset_tokens_table.php` - Password resets  
3. `2019_08_19_000000_create_failed_jobs_table.php` - Queue failed jobs
4. `2019_12_14_000001_create_personal_access_tokens_table.php` - API tokens
5. `2023_07_31_152913_create_participants_table.php` - Participant data
6. `2023_08_02_155503_create_upload_abstracts_table.php` - Abstract submissions
7. `2023_08_06_220350_create_payments_table.php` - Payment records
8. `2023_08_06_220408_create_detail_payments_table.php` - Payment details
9. `2023_08_09_195835_create_upload_fulltexts_table.php` - Full-text papers

## Key Relationships
- User → Participant (1:1)
- Participant → UploadAbstract (1:many)
- Participant → Payment (1:many)
- Payment → DetailPayment (1:1)