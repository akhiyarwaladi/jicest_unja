SELECT ua.title, ua.authors, ua.institutions, ua.abstract, ua.keywords, ua.presenter, pi.full_name1, pi.full_name2, pi.participant_type, pi.address, cast(pi.phone as CHARACTER) phone, pi.attendance
FROM upload_abstracts ua
LEFT JOIN participants pi
on ua.participant_id = pi.id
where ua.created_at > "2025-09-01"