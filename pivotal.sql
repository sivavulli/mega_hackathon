SELECT cast(P.`click_time` as date) as Day,
    COUNT(
        CASE 
            WHEN P.`curr_page_url` like '%GlobalClick%' 
            THEN 1 
            ELSE NULL 
        END
    ) AS 'Global_Click',
    COUNT(
        CASE 
            WHEN P.`curr_page_url` like '%google.com%' 
            THEN 1 
            ELSE NULL 
        END
    ) AS 'Google_page',
 COUNT(
        CASE 
            WHEN P.`curr_page_url` like '%yahoo.com%' 
            THEN 1 
            ELSE NULL 
        END
    ) AS 'Yahoo_page'
FROM    `tbl_page_click_details` P
GROUP BY cast(P.`click_time` as date);
