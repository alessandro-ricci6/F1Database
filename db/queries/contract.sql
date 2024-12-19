INSERT INTO Staff (idStaff, staffName, staffSurname, staffNationality) VALUES
(1, 'Christian', 'Horner', 'British'), (2, 'Toto', 'Wolff', 'Austrian'), (3, 'Frédéric', 'Vasseur', 'French'),
(4, 'Andrea', 'Stella', 'Italian'), (5, 'Mike', 'Krack', 'Luxembourgish'), (6, 'Oliver', 'Oakes', 'British'),
(7, 'James', 'Vowles', 'British'), (8, 'Laurent', 'Mekies', 'French'), (9, 'Ayao', 'Komatsu', 'Japan'),
(10, 'Alessandro', 'Alunni Bravi', 'Italian');

INSERT INTO StaffContract(idStaffContract, idStaff, idTeam, staffRole, startDate, endDate) VALUES
(1, 1, 7, 'Team Principal', '2005-01-01', NULL), (2, 3, 1, 'Team Principal', '2023-01-09', NULL);

INSERT INTO DriverContract(idDriverContract, idDriver, idTeam, startDate, endDate) VALUES
(1, 64, 12, '2022-01-01', '2027-12-31'), (2, 2, 22, '2023-01-01', '2026-12-31'), (3, 78, 17, '2025-01-01', '2028-12-31'),
(4, 39, 9, '2024-01-01', '2024-12-31'), (5, 79, 12, '2023-01-01', '2026-12-31'), (6, 58, 21, '2013-01-01', '2024-12-31'),
(7, 10, 6, '2023-01-01', '2024-12-31'), (8, 12, 17, '2023-01-01', '2024-12-31'), (9, 75, 23, '2024-01-01', '2024-12-31'),
(10, 62, 1, '2019-01-01', '2026-12-31'), (11, 46, 17, '2024-01-01', '2024-12-31'), (12, 65, 5, '2022-01-01', '2025-12-31'),
(13, 54, 21, '2022-01-01', '2024-12-31'), (14, 32, 7, '2021-01-01', '2026-12-31'), (15, 76, 5, '2024-01-01', '2026-12-31'),
(16, 33, 23, '2024-01-01', '2024-12-31'), (17, 66, 6, '2022-01-01', '2025-12-31'), (18, 51, 1, '2021-01-01', '2024-12-31'),
(19, 77, 12, '2024-01-01', '2024-12-31'), (20, 61, 22, '2021-01-01', '2026-12-31'), (21, 72, 23, '2024-01-01', '2024-12-31'),
(22, 52, 7, '2016-01-01', '2026-12-31'), (23, 74, 9, '2024-01-01', '2024-12-31');
