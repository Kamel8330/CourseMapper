-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2019 at 08:20 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursemapper`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `assessment_id` int(11) NOT NULL,
  `assessment` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`assessment_id`, `assessment`) VALUES
(1, 'Final Exam');

-- --------------------------------------------------------

--
-- Table structure for table `camrt`
--

CREATE TABLE `camrt` (
  `camrt_id` int(11) NOT NULL,
  `camrt_code` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL,
  `content` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(10) NOT NULL,
  `course_code` varchar(250) NOT NULL,
  `course_name` varchar(250) NOT NULL,
  `course_description` varchar(250) NOT NULL,
  `major_id_fk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_code`, `course_name`, `course_description`, `major_id_fk`) VALUES
(25, 'RADTH 205', 'Patient Care Principles and Practice', 'Introduces the cancer disease trajectory and examines the principles of: palliative care psycho-social issues and factors affecting oncology patients; patient education; person centered care; and toxicity assessment', 17),
(26, 'ONCOL 233', 'Concepts and Applications in Medical Physics ', 'Introduction into fundamental medical physics concepts including theory of atomic and nuclear structure, radioactivity, and electromagnetic and particulate radiation. Topics to be covered include production of medically useful radiation, interaction ', 17),
(27, 'ONCOL 234', 'Therapeutic and Imaging Equipment in Radiation Therapy ', 'Builds on the concepts covered in ONCOL 233, with a shifting emphasis towards how radiation is produced, shaped, and measured in the clinical environment. Specific topics include x-ray tubes and flatpanel detectors, CT scanners, brachytherapy afterlo', 17),
(28, 'ONCOL 243', 'Radiation Protection and Safety ', 'Introduction of the fundamental concepts in radiation protection and safety for the patient, self, and general public. Topics include: general principles and practices of working with radiation in a healthcare environment, differences in protection r', 17),
(29, 'ONCOL 253', 'Cancer Biology ', 'An introduction to the biology of cancer highlighting features that distinguish normal cells from cancer cells. Specific topics include the genetic basis of cancer, control of cell proliferation, invasion and metastasis, mechanism of action of cancer', 17),
(30, 'ONCOL 254', 'Principles of Oncology', 'A survey course outlining the basic concepts in clinical oncology including epidemiology, cancer screening, cancer staging and pathology, molecular diagnostics, all modalities of treating primary, metastatic and resistant cancers. Definitions for the', 17),
(31, 'PHYSL 210', 'Human Physiology ', 'Introductory course in human physiology. Students will study the function and regulation of the human body and the complexities and interactions of cells, tissues, major organs and systems. This course is offered as a classroom-based course or in an ', 17),
(32, 'CELL 201', 'Introduction to Molecular Cell Biology ', 'An introductory Cell Biology course suitable for students interested in pursuing Cell Biology specialization/honors. This course focuses on the molecular aspects of modern cell biology. Topics covered include the nucleus and gene expression; membrane', 17),
(33, 'ANAT 200', 'Human Morphology ', ' An introductory survey course in general human anatomy. The course covers the gross and microscopic anatomy of the tissues, organs and organ systems of the body, with emphasis on the relationships, interactions and functions of major structures. ', 17),
(34, 'RADTH 260', 'Radiation Therapy Clinical Practicum I ', 'Provides an introduction to the patient experience through the radiation therapy planning and treatment trajectory. Enables and requires introductory participation in a variety of clinical environments.', 17),
(35, 'ONCOL 255', 'Introduction to Oncology', ' Principles and concepts of clinical oncology. ', 17),
(36, 'RADTH 301', ' Principles and Practices in Radiation Therapy ', 'The principles and practices of radiation therapy will be examined with a focus on the patient and the practitioner as well as technological factors.', 17),
(37, 'RADTH 328', 'Health Care Advocacy and Policy ', 'Examines the role policy plays in health care. It provides an overview of the professional, social, regulatory, national and global trends and issues affecting care delivery and cancer screening and prevention strategies. Codes of ethics, standards a', 17),
(38, 'ONCOL 306', 'Imaging Principles/Pathology ', 'An overview of the principles of medical imaging, including the principles of MRI, CT and PET imaging. Students will learn the relative advantages and limitations of the different techniques, and will be invited to apply the principles of cross-secti', 17),
(39, 'ONCOL 309', 'Clinical Oncology I ', 'The field of radiation oncology is introduced, as well as the evaluation and treatment of tumours with ionizing radiation. Students will begin the study of the various modalities of radiation treatment, and the respective treatment regimens and techn', 17),
(40, 'ONCOL 310', 'Clinical Oncology II ', 'The study of the field of radiation oncology is further developed. By the completion of the course, students will have developed an understanding of the various treatment options for each of the tumour sites, and the respective treatment regimes, tec', 17),
(41, 'ONCOL 335 ', 'Radiobiology ', 'An introduction to the physics, chemistry and biology of radiation effects on cells and tissues. Concepts discussed include the biological factors that influence the response of normal and neoplastic cells to radiation therapy; cell survival curves; ', 17),
(42, 'ONCOL 355', 'Treatment Planning and Dosimetry I ', 'Foundation of treatment calculations for 3 dimensional treatment planning and the principles of radiation dose deposition within the patient will be applied in order to develop an appropriate treatment strategy for typical tumour locations. The cours', 17),
(43, 'ONCOL 356', 'Treatment Planning and Dosimetry II ', ' Concepts from ONCOL 355 are explored in more detail. Advanced topics in treatment planning will be covered, including 4 dimensional treatment planning, Intensity Modulated Radiation Therapy, Inverse planning, Arc therapy, and Brachytherapy planning.', 17),
(44, 'ANAT 305', 'Cross-Sectional Anatomy ', 'A study of human gross anatomy from a regional perspective, with a particular emphasis on cross-sectional structure and three-dimensional relationships. Students will apply their knowledge to correlate prosected human cadaveric specimens with radiolo', 17),
(45, 'INT D 410', 'Interprofessional Health Team Development ', 'A course intended to provide knowledge, skills and experience in interprofessional (IP) health care competencies. (Offered jointly by the following faculties: Agricultural, Life and Environmental Sciences; Medicine and Dentistry; Nursing; Pharmacy an', 17),
(46, 'RADTH 360', 'Clinical Simulation and Reasoning', 'This course facilitates the integration and application of theoretical knowledge when performing in a simulated clinical setting. While transferring skills across tumour sites and various procedures, students will demonstrate clinical reasoning and d', 17),
(47, 'RADTH 401', 'Radiation Therapy Research Methodology ', 'Examines a broad scope of research methods and components. Students will examine the action research process; research ethics; clinical trial methods and outcomes; and statistical methods in more depth. Development of a research project proposal and ', 17),
(48, 'RADTH 460', 'Radiation Therapy Clinical Practicum II ', ' Involves the progression of application and integration of knowledge gained from all academic course and skills attained in the simulation environment to put into practice in the clinical environment. Skills learned will enable the student to perfor', 17),
(49, 'RADTH 461', 'Radiation Therapy Clinical Practicum III ', 'Involves the demonstration of critical thinking, clinical reasoning, effective problem-solving, and competent performance in all areas of entry-level radiation therapy practice. Successful completion of all components in mandatory for eligibility to ', 17),
(56, 'test', 'test', 'test', 12),
(57, 'aaa', 'aaa', 'aaa', 17),
(58, 'k', 'k', 'k', 12);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(10) NOT NULL,
  `department_name` varchar(250) NOT NULL,
  `school_id_fk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `school_id_fk`) VALUES
(23, 'Computer Science & Information Technology', 16),
(24, 'CCE', 18),
(25, 'Radiology', 3);

-- --------------------------------------------------------

--
-- Table structure for table `enrolls_offeredcourse`
--

CREATE TABLE `enrolls_offeredcourse` (
  `student_id_fk` int(11) NOT NULL,
  `offeredcourse_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `instructor_id` int(11) NOT NULL,
  `instructor_name` varchar(250) DEFAULT NULL,
  `instructor_surname` varchar(250) DEFAULT NULL,
  `instructor_degree` varchar(250) DEFAULT NULL,
  `user_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`instructor_id`, `instructor_name`, `instructor_surname`, `instructor_degree`, `user_id_fk`) VALUES
(1, 'Instructor', 'Instructor', 'PHD - Data Science', 3);

-- --------------------------------------------------------

--
-- Table structure for table `learningobjectives`
--

CREATE TABLE `learningobjectives` (
  `learningobjectives_id` int(11) NOT NULL,
  `learningobjectives` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `learningoutcomes`
--

CREATE TABLE `learningoutcomes` (
  `learningoutcomes_id` int(11) NOT NULL,
  `learningoutcomes` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `major_id` int(10) NOT NULL,
  `major_name` varchar(250) NOT NULL,
  `department_id_fk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`major_id`, `major_name`, `department_id_fk`) VALUES
(12, 'Information Technology', 23),
(13, 'Computer Science', 23),
(14, 'Computer Engineer', 24),
(15, 'Communication Engineer', 24),
(16, 'MajorTest', 23),
(17, 'Radiation Therapy', 25);

-- --------------------------------------------------------

--
-- Table structure for table `mapperdescription`
--

CREATE TABLE `mapperdescription` (
  `mapperdescription_id` int(11) NOT NULL,
  `offeredcourse_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mp_assessment`
--

CREATE TABLE `mp_assessment` (
  `mp_id_fk` int(11) DEFAULT NULL,
  `assessment_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mp_camrt`
--

CREATE TABLE `mp_camrt` (
  `mp_id_fk` int(11) DEFAULT NULL,
  `camrt_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mp_content`
--

CREATE TABLE `mp_content` (
  `mp_id_fk` int(11) DEFAULT NULL,
  `content_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mp_learningobjectives`
--

CREATE TABLE `mp_learningobjectives` (
  `mp_id_fk` int(11) DEFAULT NULL,
  `lo_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mp_learningoutcomes`
--

CREATE TABLE `mp_learningoutcomes` (
  `mp_id_fk` int(11) DEFAULT NULL,
  `lo_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mp_module`
--

CREATE TABLE `mp_module` (
  `mp_id_fk` int(11) DEFAULT NULL,
  `module_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mp_section`
--

CREATE TABLE `mp_section` (
  `mp_id_fk` int(11) DEFAULT NULL,
  `section_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offeredcourses`
--

CREATE TABLE `offeredcourses` (
  `course_id_fk` int(10) NOT NULL,
  `semester_id_fk` int(10) NOT NULL,
  `year_id_fk` int(10) NOT NULL,
  `instructor_id_fk` int(11) NOT NULL,
  `section_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offeredcourses`
--

INSERT INTO `offeredcourses` (`course_id_fk`, `semester_id_fk`, `year_id_fk`, `instructor_id_fk`, `section_id_fk`) VALUES
(25, 1, 2, 1, 1),
(25, 4, 2, 1, 1),
(26, 1, 2, 1, 1),
(27, 1, 2, 1, 1),
(28, 1, 2, 1, 1),
(29, 1, 2, 1, 1),
(30, 1, 2, 1, 1),
(31, 1, 2, 1, 1),
(32, 1, 2, 1, 1),
(33, 1, 2, 1, 1),
(34, 2, 2, 1, 1),
(35, 2, 2, 1, 1),
(36, 2, 3, 1, 1),
(37, 1, 4, 1, 1),
(39, 1, 4, 1, 1),
(40, 4, 3, 1, 1),
(41, 4, 3, 1, 1),
(42, 4, 3, 1, 1),
(43, 4, 3, 1, 1),
(44, 1, 3, 1, 1),
(45, 1, 3, 1, 1),
(46, 2, 3, 1, 1),
(47, 3, 3, 1, 1),
(48, 3, 4, 1, 1),
(49, 1, 4, 1, 1),
(49, 2, 1, 1, 1),
(56, 1, 1, 1, 1),
(57, 1, 1, 1, 1),
(58, 1, 1, 1, 1),
(58, 2, 3, 1, 2),
(58, 4, 3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `prerequisite`
--

CREATE TABLE `prerequisite` (
  `prerequisite_id` int(10) NOT NULL,
  `course_id_fk` int(10) NOT NULL,
  `course_prerequisite_id_fk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prerequisite`
--

INSERT INTO `prerequisite` (`prerequisite_id`, `course_id_fk`, `course_prerequisite_id_fk`) VALUES
(7, 25, 27),
(8, 58, 57),
(9, 58, 56);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(10) NOT NULL,
  `role_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'administrator'),
(2, 'dean'),
(3, 'instructor'),
(4, 'student'),
(5, 'registrar'),
(6, 'faculty');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(10) NOT NULL,
  `school_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_id`, `school_name`) VALUES
(3, 'Medicine & Radiology'),
(13, 'Business'),
(16, 'Arts & Science'),
(18, 'Engineering'),
(19, 'Pharmacy');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `section_room` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_room`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(11) NOT NULL,
  `semester_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester_name`) VALUES
(1, 'Fall'),
(2, 'Spring'),
(3, 'Summer'),
(4, 'Winter');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(250) NOT NULL,
  `student_fatherName` varchar(250) NOT NULL,
  `student_surname` varchar(250) NOT NULL,
  `student_dob` date NOT NULL,
  `student_city` varchar(250) NOT NULL,
  `student_country` varchar(250) NOT NULL,
  `user_id_fk` int(11) NOT NULL,
  `major_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `log_id` int(11) NOT NULL,
  `class` varchar(250) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `user_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role_id_fk` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role_id_fk`) VALUES
(2, 'Admin', '4e7afebcfbae000b22c7c85e5560f89a2a0280b4', 1),
(3, 'Instructor', 'f457a632f20425501d37897faf05ddb13405550f', 3),
(4, 'Registrar', 'caacc66c89018e22ff79f7bfce616a1f62740a8c', 5),
(5, 'Student', '42b32794792b48313cd1be9ca11b690d3e614683', 4),
(6, 'Student', '42b32794792b48313cd1be9ca11b690d3e614683', 4);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `id` int(11) NOT NULL,
  `year` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`id`, `year`) VALUES
(1, 1),
(2, 2),
(3, 4),
(4, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`assessment_id`);

--
-- Indexes for table `camrt`
--
ALTER TABLE `camrt`
  ADD PRIMARY KEY (`camrt_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `major_id_fk` (`major_id_fk`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `school_id_fk` (`school_id_fk`);

--
-- Indexes for table `enrolls_offeredcourse`
--
ALTER TABLE `enrolls_offeredcourse`
  ADD KEY `student_id_fk` (`student_id_fk`),
  ADD KEY `offeredcourse_id_fk` (`offeredcourse_id_fk`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructor_id`),
  ADD KEY `user_id_fk` (`user_id_fk`);

--
-- Indexes for table `learningobjectives`
--
ALTER TABLE `learningobjectives`
  ADD PRIMARY KEY (`learningobjectives_id`);

--
-- Indexes for table `learningoutcomes`
--
ALTER TABLE `learningoutcomes`
  ADD PRIMARY KEY (`learningoutcomes_id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`major_id`),
  ADD KEY `department_id_fk` (`department_id_fk`);

--
-- Indexes for table `mapperdescription`
--
ALTER TABLE `mapperdescription`
  ADD PRIMARY KEY (`mapperdescription_id`),
  ADD KEY `course_id_fk` (`offeredcourse_id_fk`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `mp_assessment`
--
ALTER TABLE `mp_assessment`
  ADD KEY `mp_id_fk` (`mp_id_fk`),
  ADD KEY `assessment_id_fk` (`assessment_id_fk`);

--
-- Indexes for table `mp_camrt`
--
ALTER TABLE `mp_camrt`
  ADD KEY `mp_id_fk` (`mp_id_fk`),
  ADD KEY `camrt_id_fk` (`camrt_id_fk`);

--
-- Indexes for table `mp_content`
--
ALTER TABLE `mp_content`
  ADD KEY `mp_id_fk` (`mp_id_fk`),
  ADD KEY `content_id_fk` (`content_id_fk`);

--
-- Indexes for table `mp_learningobjectives`
--
ALTER TABLE `mp_learningobjectives`
  ADD KEY `mp_id_fk` (`mp_id_fk`),
  ADD KEY `lo_id_fk` (`lo_id_fk`);

--
-- Indexes for table `mp_learningoutcomes`
--
ALTER TABLE `mp_learningoutcomes`
  ADD KEY `mp_id_fk` (`mp_id_fk`),
  ADD KEY `lo_id_fk` (`lo_id_fk`);

--
-- Indexes for table `mp_module`
--
ALTER TABLE `mp_module`
  ADD KEY `mp_id_fk` (`mp_id_fk`),
  ADD KEY `module_id_fk` (`module_id_fk`);

--
-- Indexes for table `mp_section`
--
ALTER TABLE `mp_section`
  ADD KEY `mp_id_fk` (`mp_id_fk`),
  ADD KEY `section_id_fk` (`section_id_fk`);

--
-- Indexes for table `offeredcourses`
--
ALTER TABLE `offeredcourses`
  ADD PRIMARY KEY (`course_id_fk`,`semester_id_fk`,`year_id_fk`),
  ADD KEY `semester_id_fk` (`semester_id_fk`),
  ADD KEY `year_id_fk` (`year_id_fk`),
  ADD KEY `instructor_id_fk` (`instructor_id_fk`),
  ADD KEY `section_id_fk` (`section_id_fk`);

--
-- Indexes for table `prerequisite`
--
ALTER TABLE `prerequisite`
  ADD PRIMARY KEY (`prerequisite_id`),
  ADD KEY `courseconstraint` (`course_id_fk`),
  ADD KEY `course_prequisite` (`course_prerequisite_id_fk`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `user_id_fk` (`user_id_fk`),
  ADD KEY `major_id_fk` (`major_id_fk`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id_fk` (`user_id_fk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_fk_constraint` (`role_id_fk`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `assessment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `camrt`
--
ALTER TABLE `camrt`
  MODIFY `camrt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learningobjectives`
--
ALTER TABLE `learningobjectives`
  MODIFY `learningobjectives_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `learningoutcomes`
--
ALTER TABLE `learningoutcomes`
  MODIFY `learningoutcomes_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `major_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mapperdescription`
--
ALTER TABLE `mapperdescription`
  MODIFY `mapperdescription_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prerequisite`
--
ALTER TABLE `prerequisite`
  MODIFY `prerequisite_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`major_id_fk`) REFERENCES `major` (`major_id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`school_id_fk`) REFERENCES `school` (`school_id`);

--
-- Constraints for table `enrolls_offeredcourse`
--
ALTER TABLE `enrolls_offeredcourse`
  ADD CONSTRAINT `enrolls_offeredcourse_ibfk_1` FOREIGN KEY (`student_id_fk`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `enrolls_offeredcourse_ibfk_2` FOREIGN KEY (`offeredcourse_id_fk`) REFERENCES `offeredcourses` (`course_id_fk`);

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `instructors_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `major`
--
ALTER TABLE `major`
  ADD CONSTRAINT `major_ibfk_1` FOREIGN KEY (`department_id_fk`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `mapperdescription`
--
ALTER TABLE `mapperdescription`
  ADD CONSTRAINT `mapperdescription_ibfk_1` FOREIGN KEY (`offeredcourse_id_fk`) REFERENCES `offeredcourses` (`course_id_fk`);

--
-- Constraints for table `mp_assessment`
--
ALTER TABLE `mp_assessment`
  ADD CONSTRAINT `mp_assessment_ibfk_1` FOREIGN KEY (`assessment_id_fk`) REFERENCES `assessments` (`assessment_id`),
  ADD CONSTRAINT `mp_assessment_ibfk_2` FOREIGN KEY (`mp_id_fk`) REFERENCES `mapperdescription` (`mapperdescription_id`);

--
-- Constraints for table `mp_camrt`
--
ALTER TABLE `mp_camrt`
  ADD CONSTRAINT `mp_camrt_ibfk_1` FOREIGN KEY (`mp_id_fk`) REFERENCES `mapperdescription` (`mapperdescription_id`),
  ADD CONSTRAINT `mp_camrt_ibfk_2` FOREIGN KEY (`camrt_id_fk`) REFERENCES `camrt` (`camrt_id`);

--
-- Constraints for table `mp_content`
--
ALTER TABLE `mp_content`
  ADD CONSTRAINT `mp_content_ibfk_1` FOREIGN KEY (`content_id_fk`) REFERENCES `content` (`content_id`),
  ADD CONSTRAINT `mp_content_ibfk_2` FOREIGN KEY (`mp_id_fk`) REFERENCES `mapperdescription` (`mapperdescription_id`);

--
-- Constraints for table `mp_learningobjectives`
--
ALTER TABLE `mp_learningobjectives`
  ADD CONSTRAINT `mp_learningobjectives_ibfk_1` FOREIGN KEY (`mp_id_fk`) REFERENCES `mapperdescription` (`mapperdescription_id`),
  ADD CONSTRAINT `mp_learningobjectives_ibfk_2` FOREIGN KEY (`lo_id_fk`) REFERENCES `learningobjectives` (`learningobjectives_id`);

--
-- Constraints for table `mp_learningoutcomes`
--
ALTER TABLE `mp_learningoutcomes`
  ADD CONSTRAINT `mp_learningoutcomes_ibfk_1` FOREIGN KEY (`lo_id_fk`) REFERENCES `learningoutcomes` (`learningoutcomes_id`),
  ADD CONSTRAINT `mp_learningoutcomes_ibfk_2` FOREIGN KEY (`mp_id_fk`) REFERENCES `mapperdescription` (`mapperdescription_id`);

--
-- Constraints for table `mp_module`
--
ALTER TABLE `mp_module`
  ADD CONSTRAINT `mp_module_ibfk_1` FOREIGN KEY (`mp_id_fk`) REFERENCES `mapperdescription` (`mapperdescription_id`),
  ADD CONSTRAINT `mp_module_ibfk_2` FOREIGN KEY (`module_id_fk`) REFERENCES `modules` (`module_id`);

--
-- Constraints for table `mp_section`
--
ALTER TABLE `mp_section`
  ADD CONSTRAINT `mp_section_ibfk_1` FOREIGN KEY (`mp_id_fk`) REFERENCES `mapperdescription` (`mapperdescription_id`);

--
-- Constraints for table `offeredcourses`
--
ALTER TABLE `offeredcourses`
  ADD CONSTRAINT `offeredcourses_ibfk_1` FOREIGN KEY (`semester_id_fk`) REFERENCES `semester` (`semester_id`),
  ADD CONSTRAINT `offeredcourses_ibfk_2` FOREIGN KEY (`year_id_fk`) REFERENCES `year` (`id`),
  ADD CONSTRAINT `offeredcourses_ibfk_3` FOREIGN KEY (`course_id_fk`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `offeredcourses_ibfk_4` FOREIGN KEY (`instructor_id_fk`) REFERENCES `instructors` (`instructor_id`),
  ADD CONSTRAINT `offeredcourses_ibfk_5` FOREIGN KEY (`section_id_fk`) REFERENCES `section` (`section_id`);

--
-- Constraints for table `prerequisite`
--
ALTER TABLE `prerequisite`
  ADD CONSTRAINT `course_prequisite` FOREIGN KEY (`course_prerequisite_id_fk`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courseconstraint` FOREIGN KEY (`course_id_fk`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`major_id_fk`) REFERENCES `major` (`major_id`);

--
-- Constraints for table `userlog`
--
ALTER TABLE `userlog`
  ADD CONSTRAINT `userlog_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role_fk_constraint` FOREIGN KEY (`role_id_fk`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
