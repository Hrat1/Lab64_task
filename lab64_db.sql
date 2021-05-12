-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 12, 2021 at 12:04 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `lab64_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
                          `id` int(11) NOT NULL,
                          `name` varchar(90) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                          `username` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                          `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`) VALUES
(8, 'VyGBe/w1CCvSkbAuvksT8Q==', 'VyGBe/w1CCvSkbAuvksT8Q==', 'VyGBe/w1CCvSkbAuvksT8Q=='),
(12, 'qRHINt7JDIrxt58+w0JufQ==', 'Uw6S7s0QOQ40VYsEmvZGJQ==', 'VyGBe/w1CCvSkbAuvksT8Q==');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
                            `id` int(11) NOT NULL,
                            `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                            `price` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                            `img` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `img`) VALUES
(39, 'GsV/JiOLUQqqjKFXtjobvA==', 'A5gWo2/CCZbLqm2ulyEAtg==', 'KrOkQ4uZSm9wkUqSIgSV1nEDMRMFkBgOf3j3oafFIWfE1+qLvV9fxFsh63W6T/J3'),
(40, 'Ukq7QaFOA98VdAhi4Z7+Fg==', 'cRO9c5FoipapIn9S8an58g==', 'ARf9XfM/LScvYUE5M6rT5aDeUpRv4bTEVsUZs9ImK39v/wiIA6Zp8V9MRPUKCzdq'),
(41, 'EWoAItJYBex9yNxr706Xow==', 'A5gWo2/CCZbLqm2ulyEAtg==', 'KrOkQ4uZSm9wkUqSIgSV1nEDMRMFkBgOf3j3oafFIWfeLQzUGjbkY/yxjlg+1xrK'),
(42, 'criEhvbCPJigDuo11wu4Gg==', 'xvXTc3l0b/bANEQSnI1N3A==', 'PbDWNAvq1OUV9Z8C7V/d+/yqy9FdA3+czLFdNH8KdxFqwh3I+IfXo/gT9ZWE5rym'),
(43, 'ZD99iCgjYfTJZ4VTEpFkPg==', 'xvXTc3l0b/bANEQSnI1N3A==', 'PbDWNAvq1OUV9Z8C7V/d+/yqy9FdA3+czLFdNH8KdxEZ0nMiXPFONNNO+IopSkMj'),
(44, 'EAyFMwbVKmY3iHDiL1uuBw==', 'CSoVK910nwxLLH47FNvNsw==', 'baS2Q3D6BJTVyqzqDycD6c0n6B0q0Uow+A6pgB0ADpUL+4IcVg8nRoylrA08lUaS'),
(46, 'ij90HMpzOzMeW1sgSkXamw==', '+Qx374G3CZU4zA4cSsoIrQ==', 'GlI8HAalOFzHhEc6b76/ViMedgGESpMih83u2PxGTyq8/QXAcwy6OQNGQRqwUEzL4Uu3APMJ79UuyIQKdTe5uQ=='),
(47, 'XZc+tV7giKk6ymgV+6DYXw==', 'Qtu8lsXmTOx31NOukXNB5Q==', 'DIIvddeI+tE2ob3Q6dsY7yUYBkYisv2UTxPt4+S0ixJ6P/M0GfyMWo0jHWhgbA3k'),
(48, 'BQXzQhT7+ICm5g9nJFtFOw==', 'A5gWo2/CCZbLqm2ulyEAtg==', 'KrOkQ4uZSm9wkUqSIgSV1nEDMRMFkBgOf3j3oafFIWc0xsOQ5iVHwV9S3Rd+WQAu'),
(49, '3dZfpigIFalVw/RmvUsK0w==', 'hQD1emR7O6yNaVFpEdNdLw==', 'wSClMwxnVBwKyhC/fRHgdp697UttByGPbDgWqYr/XWZO6eoK+V96vjGGrZbqoZAQ'),
(50, '8hlZldJFBSm7pjmtPfTQdA==', 'zk7JvK8QAVnCjBzljewK1A==', 'qykXO9ESoYsDoIKGCXpeKgEwTEjUTUirXgxHQyovypjfNrTjvYZkzlX/j1LY4LJp'),
(51, '57g6RS3v2nnpdQi7+EDuBw==', 'zk7JvK8QAVnCjBzljewK1A==', 'qykXO9ESoYsDoIKGCXpeKgEwTEjUTUirXgxHQyovypjRhIHqEq7Jc7WuhS/99NYs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
