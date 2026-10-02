-- Run in the conference database's SQL tab in phpMyAdmin.
-- Applies to the existing 2026 pricing rows and online IDR amounts.
START TRANSACTION;

UPDATE fees
SET fee_idr_online = CASE WHEN early_bird = 1 THEN 400000 ELSE 500000 END
WHERE category = 'presenter'
  AND participant_type = 'regular'
  AND payment_start >= '2026-01-01' AND payment_start < '2027-01-01';

UPDATE fees
SET fee_idr_online = 300000, early_bird = 0
WHERE category = 'presenter'
  AND participant_type = 'student'
  AND payment_start >= '2026-01-01' AND payment_start < '2027-01-01';

UPDATE fees
SET fee_idr_online = CASE WHEN participant_type = 'student' THEN 50000 ELSE 100000 END,
    early_bird = 0
WHERE category = 'participant'
  AND participant_type IN ('regular', 'student')
  AND payment_start >= '2026-01-01' AND payment_start < '2027-01-01';

COMMIT;

SELECT category, participant_type, early_bird,
       MIN(fee_idr_online) AS minimum_idr,
       MAX(fee_idr_online) AS maximum_idr,
       COUNT(*) AS date_window_rows
FROM fees
WHERE category IN ('presenter', 'participant')
  AND participant_type IN ('regular', 'student')
  AND payment_start >= '2026-01-01' AND payment_start < '2027-01-01'
GROUP BY category, participant_type, early_bird
ORDER BY category, participant_type, early_bird DESC;
