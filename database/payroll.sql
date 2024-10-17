-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 12:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `department_head_id` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_titles`
--

CREATE TABLE `job_titles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_groups`
--

CREATE TABLE `payroll_groups` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(10) UNSIGNED NOT NULL,
  `rfid_uid` varchar(32) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `marital_status` enum('Single','Married','Divorced','Legally Separated','Widowed') NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_picture` mediumblob DEFAULT NULL,
  `emergency_contact_name` varchar(90) NOT NULL,
  `emergency_contact_relationship` varchar(30) NOT NULL,
  `emergency_contact_phone_number` varchar(15) NOT NULL,
  `emergency_contact_email_address` varchar(255) DEFAULT NULL,
  `emergency_contact_address` varchar(255) DEFAULT NULL,
  `employee_code` varchar(32) NOT NULL,
  `job_title_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `employment_type` enum('Regular / Permanent','Casual','Fixed-Term','Probationary','Project-Based','Seasonal') NOT NULL,
  `date_of_hire` date NOT NULL,
  `supervisor_id` int(10) UNSIGNED DEFAULT NULL,
  `manager_id` int(10) UNSIGNED DEFAULT NULL,
  `access_role` enum('Staff','Supervisor','Manager') NOT NULL,
  `payroll_group_id` int(10) UNSIGNED NOT NULL,
  `basic_salary` decimal(10,2) NOT NULL,
  `tin_number` varchar(15) NOT NULL,
  `sss_number` varchar(14) NOT NULL,
  `philhealth_number` varchar(14) NOT NULL,
  `pagibig_fund_number` varchar(14) NOT NULL,
  `withholding_tax_amount` decimal(10,2) NOT NULL,
  `sss_contribution_employee_share` decimal(7,2) NOT NULL,
  `sss_contribution_employer_share` decimal(7,2) NOT NULL,
  `philhealth_contribution_employee_share` decimal(6,2) NOT NULL,
  `philhealth_contribution_employer_share` decimal(6,2) NOT NULL,
  `pagibig_fund_contribution_employee_share` decimal(5,2) NOT NULL,
  `pagibig_fund_contribution_employer_share` decimal(5,2) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_branch_name` varchar(100) NOT NULL,
  `bank_account_number` varchar(25) NOT NULL,
  `bank_account_type` enum('Payroll Account','Current Account','Checking Account','Savings Account') NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_admins_username` (`username`),
  ADD KEY `idx_admins_deleted_at` (`deleted_at`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_departments_name` (`name`),
  ADD KEY `idx_departments_status` (`status`),
  ADD KEY `idx_departments_deleted_at` (`deleted_at`),
  ADD KEY `fk_staff_departments_department_head_id` (`department_head_id`),
  ADD KEY `fk_admins_departments_created_by` (`created_by`),
  ADD KEY `fk_admins_departments_updated_by` (`updated_by`),
  ADD KEY `fk_admins_departments_deleted_by` (`deleted_by`);

--
-- Indexes for table `job_titles`
--
ALTER TABLE `job_titles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_job_titles_title` (`title`),
  ADD KEY `idx_job_titles_status` (`status`),
  ADD KEY `idx_job_titles_deleted_at` (`deleted_at`),
  ADD KEY `fk_departments_job_titles_department_id` (`department_id`),
  ADD KEY `fk_admins_job_titles_created_by` (`created_by`),
  ADD KEY `fk_admins_job_titles_updated_by` (`updated_by`),
  ADD KEY `fk_admins_job_titles_deleted_by` (`deleted_by`);

--
-- Indexes for table `payroll_groups`
--
ALTER TABLE `payroll_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_staff_rfid_uid` (`rfid_uid`),
  ADD UNIQUE KEY `uq_staff_phone_number` (`phone_number`),
  ADD UNIQUE KEY `uq_staff_email_address` (`email_address`),
  ADD UNIQUE KEY `uq_staff_employee_code` (`employee_code`),
  ADD UNIQUE KEY `uq_staff_tin_number` (`tin_number`),
  ADD UNIQUE KEY `uq_staff_sss_number` (`sss_number`),
  ADD UNIQUE KEY `uq_staff_philhealth_number` (`philhealth_number`),
  ADD UNIQUE KEY `uq_staff_pagibig_fund_number` (`pagibig_fund_number`),
  ADD UNIQUE KEY `uq_staff_bank_account_number` (`bank_account_number`),
  ADD UNIQUE KEY `uq_staff_username` (`username`),
  ADD KEY `idx_staff_first_name_last_name` (`first_name`,`last_name`),
  ADD KEY `idx_staff_date_of_birth` (`date_of_birth`),
  ADD KEY `idx_staff_gender` (`gender`),
  ADD KEY `idx_staff_marital_status` (`marital_status`),
  ADD KEY `idx_staff_employment_type` (`employment_type`),
  ADD KEY `idx_staff_date_of_hire` (`date_of_hire`),
  ADD KEY `idx_staff_access_role` (`access_role`),
  ADD KEY `idx_staff_deleted_at` (`deleted_at`),
  ADD KEY `fk_job_titles_staff_job_title_id` (`job_title_id`),
  ADD KEY `fk_departments_staff_department_id` (`department_id`),
  ADD KEY `fk_staff_supervisor_id` (`supervisor_id`),
  ADD KEY `fk_staff_manager_id` (`manager_id`),
  ADD KEY `fk_payroll_groups_staff_payroll_group_id` (`payroll_group_id`),
  ADD KEY `fk_admins_staff_created_by` (`created_by`),
  ADD KEY `fk_admins_staff_updated_by` (`updated_by`),
  ADD KEY `fk_admins_staff_deleted_by` (`deleted_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_titles`
--
ALTER TABLE `job_titles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_groups`
--
ALTER TABLE `payroll_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `fk_admins_departments_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `fk_admins_departments_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `fk_admins_departments_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `fk_staff_departments_department_head_id` FOREIGN KEY (`department_head_id`) REFERENCES `staff` (`id`);

--
-- Constraints for table `job_titles`
--
ALTER TABLE `job_titles`
  ADD CONSTRAINT `fk_admins_job_titles_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `fk_admins_job_titles_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `fk_admins_job_titles_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `fk_departments_job_titles_department_id` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `fk_admins_staff_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `fk_admins_staff_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `fk_admins_staff_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `fk_departments_staff_department_id` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `fk_job_titles_staff_job_title_id` FOREIGN KEY (`job_title_id`) REFERENCES `job_titles` (`id`),
  ADD CONSTRAINT `fk_payroll_groups_staff_payroll_group_id` FOREIGN KEY (`payroll_group_id`) REFERENCES `payroll_groups` (`id`),
  ADD CONSTRAINT `fk_staff_manager_id` FOREIGN KEY (`manager_id`) REFERENCES `staff` (`id`),
  ADD CONSTRAINT `fk_staff_supervisor_id` FOREIGN KEY (`supervisor_id`) REFERENCES `staff` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
