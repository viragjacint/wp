SELECT d.company_name AS 'organisation name', d.category, IF(d.all_conditions = 1, GROUP_CONCAT(DISTINCT tag.tag), d.conditions) AS 'conditions', d.contact_describtion AS 'description', d.tel, d.tel2, d.mobile, d.email, d.email2, d.web, d.web2, d.address, d.town, d.county, d.post_code AS 'post code', IF(d.state = 1, "published", "unpublished") AS 'status',d.contact_page_notes AS 'contact history', d.last_contacted_date AS 'last contacted', d.last_updated_date AS 'last updated' FROM jds4a_directory d INNER JOIN jds4a_tags_resources res on d.id = res.resource_id INNER JOIN jds4a_tags tag on tag.id = res.tag_id WHERE tag.category = 'condition' GROUP BY res.resource_id



SELECT d.company_name AS organisation_name,
       GROUP_CONCAT(DISTINCT (CASE WHEN tag.category = 'category' THEN tag.tag END)) AS category,
       GROUP_CONCAT(DISTINCT (CASE WHEN tag.category = 'condition' THEN tag.tag END)) AS conditions,
       d.contact_describtion AS 'description',
       d.tel,
       d.tel2,
       d.mobile,
       d.email,
       d.email2,
       d.web,
       d.web2,
       d.address,
       d.town,
       d.county,
       d.post_code AS 'post code',
       IF(d.state = 1, "published", "unpublished") AS 'status',
       d.contact_page_notes AS 'contact history',
       d.last_contacted_date AS 'last contacted',
       d.last_updated_date AS 'last updated'
FROM jds4a_directory d INNER JOIN
     jds4a_tags_resources res
     on d.id = res.resource_id INNER JOIN
     jds4a_tags tag
     on tag.id = res.tag_id
WHERE tag.category IN ('condition', 'category') AND d.state != '-2'
GROUP BY d.id





SELECT d.company_name AS 'organisation name',
GROUP_CONCAT(DISTINCT tag.tag) AS 'category',
GROUP_CONCAT(DISTINCT tag1.tag) AS 'conditions', d.contact_describtion AS 'description', d.tel, d.tel2, d.mobile, d.email, d.email2, d.web, d.web2, d.address, d.town, d.county, d.post_code AS 'post code', IF(d.state = 1, "published", "unpublished") AS 'status',d.contact_page_notes AS 'contact history', d.last_contacted_date AS 'last contacted', d.last_updated_date AS 'last updated'
FROM jds4a_directory d
INNER JOIN  jds4a_tags_resources res
on d.id = res.resource_id
LEFT JOIN jds4a_tags tag
on tag.id = res.tag_id AND tag.category = 'category'
LEFT JOIN jds4a_tags tag1
on tag1.id = res.tag_id AND tag1.category = 'condition'
GROUP BY d.company_name



SET @cond = 'Eczema,Hypermobility,Asthma,Albinism,Allergy,Angelman Syndrome,Arthritis,Birthmarks,Brain Injury,Cerebral Palsy,Brain & Spine Disorders,Cancer,Challenging Behaviour,Chromosome Disorders,Cleft Lip & Palate,Cystic Fibrosis,Diabetes,Disfigurement,Ehlers-danlos Syndrome,Epilepsy,Fragile X,Gastrointestinal Disorders,Coeliac Disease,Gender Identity,Genetic Disorders,Gifted Children,Haemophilia,Handwriting Difficulties,Heart Disorders,Hiv/aids,Incontinence,Kidney Disease,Landau Kleffner Syndrome,Liver Disease,Lung Conditions,Lupus,Meningitis,Multiple Births,Muscular Dystrophy,Pathalogical Demand Avoidance Syndrome,Prader-Willi Syndrome,Rett Syndrome,Rubinstein-taybi Syndrome,Scoliosis,Sickle Cell,Spina Bifida &/or Hydrocephalus,Spinal Cord Injury,Stroke,Tourette Syndrome,Tracheostomy,Worster-drought Syndrome,Brittle Bones,Hemiplegia,Dyspraxia,Growth Disorders,Limb Disabilities,Hearing Impairment,Deafblind,Multiple Sclerosis,Foetal Alcohol Syndrome';

SET @cond = (SELECT GROUP_CONCAT(tag) FROM jds4a_tags WHERE category = 'condition' GROUP BY category);

SELECT d.company_name AS organisation_name,
       GROUP_CONCAT(DISTINCT (CASE WHEN tag.category = 'category' THEN tag.tag END)) AS category,
       GROUP_CONCAT(DISTINCT (CASE WHEN tag.category = 'sub category' THEN tag.tag END)) AS 'sub category',
       IF(d.all_conditions = 1,
         "ADD/ADHD,Autistic Spectrum Disorders,Down Syndrome,Dyslexia,Eczema,Hypermobility,Mental Health,Asthma,Albinism,Allergy,Angelman Syndrome,Anxiety Disorders,Arthritis,Birthmarks,Brain Injury,Cerebral Palsy,Brain & Spine Disorders,Cancer,Challenging Behaviour,Chromosome Disorders,Cleft Lip & Palate,Cystic Fibrosis,Diabetes,Disfigurement,Eating Disorders,Ehlers-danlos Syndrome,Epilepsy,Fragile X,Gastrointestinal Disorders,Coeliac Disease,Gender Identity,Genetic Disorders,Gifted Children,Haemophilia,Handwriting Difficulties,Heart Disorders,Hiv/aids,Incontinence,Kidney Disease,Landau Kleffner Syndrome,Life Threatening Conditions,Liver Disease,Lung Conditions,Lupus,Meningitis,Metabolic Diseases,Multiple Births,Myalgic Encephalomyelitis,Muscular Dystrophy,Pathalogical Demand Avoidance Syndrome,Prader-Willi Syndrome,Rett Syndrome,Rubinstein-taybi Syndrome,Scoliosis,Sickle Cell,Spina Bifida &/or Hydrocephalus,Spinal Cord Injury,Stroke,Tourette Syndrome,Tracheostomy,Tremor,Trisomy 13/18,Tuberous Sclerosis,Vaccine Damage",
          GROUP_CONCAT(DISTINCT (CASE WHEN tag.category = 'condition' THEN tag.tag END))) AS conditions,
       d.contact_describtion AS 'description',
       d.tel,
       d.tel2,
       d.mobile,
       d.email,
       d.email2,
       d.web,
       d.web2,
       d.address AS 'address 1',
       d.address_1 AS 'address 2',
       d.town,
       d.city,
       d.county,
       d.post_code AS 'post code',
       d.add_contact1 AS 'contact 1',
       d.add_contact2 AS 'contact 2',
       IF(d.state = 1, "published", "unpublished") AS 'status',
       d.contact_page_notes AS 'contact history',
       d.last_contacted_date AS 'last contacted',
       d.last_updated_date AS 'last updated'
FROM jds4a_directory d INNER JOIN
     jds4a_tags_resources res
     on d.id = res.resource_id INNER JOIN
     jds4a_tags tag
     on tag.id = res.tag_id
WHERE tag.category IN ('condition', 'category', 'sub category') AND d.state != '-2'
GROUP BY d.id ORDER BY d.company_name
