INSERT INTO 8ta.charts (`user_id`,`chart_name`,`config`) VALUES (1,'point chart test','{\n   \"type\":\"line\",\n   \"data\":{\n      \"labels\":[\n         \"January\",\n         \"February\",\n         \"March\",\n         \"April\",\n         \"May\",\n         \"June\"\n      ],\n      \"datasets\":[\n         {\n            \"label\":\"My First dataset\",\n            \"backgroundColor\":\"rgb(255, 99, 132)\",\n            \"borderColor\":\"rgb(255, 99, 132)\",\n            \"data\":[\n               0,\n               10,\n               5,\n               2,\n               20,\n               30,\n               45\n            ]\n         }\n      ]\n   },\n   \"options\":{\n      \n   }\n}');
INSERT INTO 8ta.charts (`user_id`, `chart_name`, `config`) VALUES(1,'pie chart test','{"type":"pie","data":{"labels":["Red","Blue","Yellow"],"datasets":[{"label":"My First Dataset","data":[300,50,100],"backgroundColor":["rgb(255, 99, 132)","rgb(54, 162, 235)","rgb(255, 205, 86)"],"hoverOffset":4}]}}');










