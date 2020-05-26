INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251');

INSERT INTO `users` (`PName`, `PAdd1`,  `PAdd2`, `PAdd3`,`PPin`, `PPhone`, `CPName`, `CPPhone`, `DLNo1`, `DLNo2`, `RangeId`, `EMail`, `UserName`, `Password`) VALUES
('Poovai Pharmacy', '255, Trunk Road', 'Poonamallee', 'Chennai', '600056', '8939474123', 'Sundar', '9710448000', '2681/TVR/20', '2681/TVR/21', 1, 'klmsundar@gmail.com', 'poovai, ''poovai'),
('Deepak Medicals & General Store', '29 D, Main Road', 'Kattupakkam', 'Chennai', '600056', '1234567890', 'Poovaraghavan', '0987654321', 'deepak', '1234/TVR/21', 1, 'raghavan@gmail.com', 'deepak', 'deepak'),
('Modern Medicals', '600/236, Trunk Road', 'Poonamallee', 'Chennai', '600056', '1234567890', 'Gopi', '0987654321', 'modern', 'modern', '4321/TVR/21', 1, 'gopi@gmail.com', 'modern'),
('R.S.M. Medicals', '2, J.C.N. Street', 'Poonamallee', 'Chennai', '600056', '1234567890', 'Gopi', '0987654321', 'modern', '4321/TVR/21', 1, 'gopi@gmail.com', 'rsm', 'rsm'),
('Divya Medicals', '4/221, Kasi Vishwanathar Kovil Street', 'Pappanchatram', 'Chennai', '.', '1234567890', 'Gopi', '0987654321', 'divya', '4321/TVR/21', 1, 'gopi@gmail.com', 'divya', 'divya');

INSERT INTO `zones`( `ZoneName`) VALUES
('Thiruvallur');

INSERT INTO `ranges` (`RangeName`, `ZoneId`) VALUES
('Poonamallee Range 1', 1),
('Ponneri', 1),
('Gummidipoondi', 1),
('Poonamallee Range 2', 1),
('Tirutani', 1),
('Pallipet', 1),
('Thiruvallur', 1),
('Avadi', 1),
('Redhills', 1);

INSERT INTO `CtrlNos` (`DstMstNo`) VALUES
(0);

INSERT INTO `DIMaster` (`DIName`, `DIUsrName`, `Phone`, `EMail`, `Password`) VALUES
('Pradeep', 'dipradeep', '1234567890', 'dipradeep@gmail.com', 'dipradeep'),
('Gowri', 'digowridivsrange', '1234567890', 'digowri@gmail.com', 'digowri'),
('Rubini', 'dirubini', '1234567890', 'dirubini@gmail.com', 'dirubini');

INSERT INTO `DIVsRange` (`DIId`, `RangeId`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 7),
(3, 8),
(3, 9);


-- Insert into users(pname, username, rangeid) SELECT 'tttt', 't1', RangeID FROM ranges WHERE RangeName = "Mangadu"