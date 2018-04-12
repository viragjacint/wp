SELECT DISTINCT
  wp_userid,
  moodle_userid,
  first_name,
  last_name,
  plan_instance_id,
  plan_name,
  plan_instance_name,
  client_id,
  client_name,
  time_raw,
  time_nice,
  library_name,
  application,
  cat_heading,
  skill_level,
  lesson,
  score,
  time_raw -
      (SELECT e2.time_raw FROM mdl_interactions e2 WHERE e2.plan_instance_id = "37679" AND e1.wp_userid = e2.wp_userid AND e1.application = e2.application AND e1.lesson = e2.lesson AND e1.time_raw > e2.time_raw ORDER BY e2.time_raw
       DESC LIMIT 1) as diff
FROM mdl_interactions e1
WHERE plan_instance_id = 37679
AND time_raw > 1519223370
ORDER BY time_raw DESC



SELECT DISTINCT
  wp_userid,
  moodle_userid,
  first_name,
  last_name,
  plan_instance_id,
  plan_name,
  plan_instance_name,
  client_id,
  client_name,
  time_raw,
  time_nice,
  library_name,
  application,
  cat_heading,
  skill_level,
  lesson,
  score
FROM mdl_interactions e1
WHERE plan_instance_id = 37679
AND time_raw > 1519223370
HAVING
  time_raw -
      (SELECT e2.time_raw FROM mdl_interactions e2 WHERE e2.plan_instance_id = "37679" AND e1.wp_userid = e2.wp_userid AND e1.application = e2.application AND e1.lesson = e2.lesson AND e1.time_raw > e2.time_raw ORDER BY e2.time_raw
       DESC LIMIT 1) > 0
  OR
  (time_raw -
      (SELECT e2.time_raw FROM mdl_interactions e2 WHERE e2.plan_instance_id = "37679" AND e1.wp_userid = e2.wp_userid AND e1.application = e2.application AND e1.lesson = e2.lesson AND e1.time_raw > e2.time_raw ORDER BY e2.time_raw
       DESC LIMIT 1)) IS NULL

ORDER BY time_raw DESC
