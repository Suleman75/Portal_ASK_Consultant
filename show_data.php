<?php
require("header.php");
require("menu.php");
$query="SELECT users.id,users.apply_date, users.full_name,users.phone_number,users.visited,users.qualification,users.comments,users.budget,lead.priority_name,sources.source_name,countries.country_name,inquiry.inquiry_location,consultants.consultant_name, follow.id,follow.user_id,follow.follow_up_number,follow.follow_up_date,follow.additional_comment,follow.staff_member,actions.action_name,outcome.outcome_name FROM user_info as users INNER JOIN lead_priority as lead on users.priority_id=lead.id INNER JOIN source as sources on users.apply_source_id=sources.id INNER JOIN country as countries ON users.country_id=countries.id INNER JOIN inquiry_form_location as inquiry ON users.inquiry_form_location_id=inquiry.id INNER JOIN consultant as consultants ON users.consultant_id=consultants.id LEFT JOIN follow_up_info as follow ON users.id=follow.user_id INNER JOIN call_outcome as outcome on follow.follow_up_outcome_id=outcome.id INNER JOIN follow_up_action as actions ON follow.follow_up_action_id=actions.id;";

require("footer.php");
?>