CREATE TABLE schedule (
	iSchedule INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
	sTitle VARCHAR(255) NOT NULL,
	sDescription TEXT,
	dtSchedule DATETIME NOT NULL
);

INSERT INTO schedule (sTitle, sDescription, dtSchedule) VALUES (
	'Brainstorm Casa do Pão',
	'Reunião de brainstorm para a campanha de rádio da Casa do Pão',
	'2016-08-03 00:00:00'
);

INSERT INTO schedule (sTitle, sDescription, dtSchedule) VALUES (
	'Visita ao cliente Space Pizzas',
	'Apresentação de propostas comerciais.',
	'2016-08-11 00:00:00'
);

INSERT INTO schedule (sTitle, sDescription, dtSchedule) VALUES (
	'Meetup design de interação',
	NULL,
	'2016-08-26 00:00:00'
);
