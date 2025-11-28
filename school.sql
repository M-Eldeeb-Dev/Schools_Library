-- THE DATABASE IS schools_library;

CREATE TABLE schools (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    school_image VARCHAR(255),
    description TEXT,
    number_of_students INT,
    academic_manger VARCHAR(255)
);


INSERT INTO schools (id, name, school_image, description, number_of_students, academic_manger) VALUES
(1, 'Bright Path School', 'images/Bright-Path-School.jpg', 'A Nice School To Learn Here', 5000, 'Zegal Osama'),
(2, 'Mountain Peak Academy', 'images/Mountain-Peak-Academy.jpg', 'A School On Everest Mountain :)', 200, 'Alex Doe'),
(3, 'Summit Grove School', 'images/Summit-Grove-School.jpg', 'Very Bad School, Students and Teachers', 1000, 'Ted Bundy'),
(4, 'VME School For Applied Technology', 'images/VME-School-For-Applied-Technology.jpg', 'An Amazing School That Teaches Students Very Useful Technologies', 6500, 'David Nabil');
