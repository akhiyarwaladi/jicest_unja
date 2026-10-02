-- Run in the conference database's SQL tab in phpMyAdmin.
-- Dates match the current remote export in jicestunja_database.sql.
SET @jicest_early_start = '2026-09-30', @jicest_early_end = '2026-10-15';
SET @jicest_regular_start = '2026-10-16', @jicest_regular_end = '2026-11-07';

START TRANSACTION;

UPDATE fees
SET fee_idr_online = CASE WHEN payment_start = @jicest_early_start THEN 400000 ELSE 500000 END,
    early_bird = CASE WHEN payment_start = @jicest_early_start THEN 1 ELSE 0 END
WHERE category = 'presenter'
  AND participant_type = 'regular'
  AND (payment_start, payment_end) IN (
      (@jicest_early_start, @jicest_early_end),
      (@jicest_regular_start, @jicest_regular_end)
  );

UPDATE fees
SET fee_idr_online = 300000, early_bird = 0
WHERE category = 'presenter'
  AND participant_type = 'student'
  AND (payment_start, payment_end) IN (
      (@jicest_early_start, @jicest_early_end),
      (@jicest_regular_start, @jicest_regular_end)
  );

UPDATE fees
SET fee_idr_online = CASE WHEN participant_type = 'student' THEN 50000 ELSE 100000 END,
    early_bird = 0
WHERE category = 'participant'
  AND participant_type IN ('regular', 'student')
  AND (payment_start, payment_end) IN (
      (@jicest_early_start, @jicest_early_end),
      (@jicest_regular_start, @jicest_regular_end)
  );

COMMIT;

SELECT category, participant_type, early_bird,
       MIN(fee_idr_online) AS minimum_idr,
       MAX(fee_idr_online) AS maximum_idr,
       COUNT(*) AS date_window_rows
FROM fees
WHERE category IN ('presenter', 'participant')
  AND participant_type IN ('regular', 'student')
  AND (payment_start, payment_end) IN (
      (@jicest_early_start, @jicest_early_end),
      (@jicest_regular_start, @jicest_regular_end)
  )
GROUP BY category, participant_type, early_bird
ORDER BY category, participant_type, early_bird DESC;
