--
-- Database: `asgardb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `categoryname` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryname`) VALUES
(1, 'Tech'),
(2, 'Science'),
(3, 'News'),
(4, 'Comedy'),
(5, 'Crafts');

-- --------------------------------------------------------

--
-- Table structure for table `datafiles`
--

CREATE TABLE `datafiles` (
  `id` int(11) UNSIGNED NOT NULL,
  `filename` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `datafiles`
--

INSERT INTO `datafiles` (`id`, `filename`) VALUES
(1, 'datafile2.json'),
(7, '34369-data.json'),
(8, '56246-data.json'),
(9, '18302-data.json'),
(10, '82565-data.json'),
(11, '45457-data.json'),
(12, '9251-data.json'),
(13, '12299-data.json'),
(14, '91958-data.json');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id_video` int(11) UNSIGNED NOT NULL,
  `datafile_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `size` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id_video`, `datafile_id`, `category_id`, `file`, `type`, `size`, `title`, `keywords`) VALUES
(1, 1, 1, '', '', 0, '', ''),
(23, 7, 3, '28155-testvideo.mp4', 'video/mp4', 1, 'First Video', 'With Key Words, Oneword, two words'),
(24, 8, 2, '62032-testvideo.mp4', 'video/mp4', 1, 'Second Video', 'New Cagetory '),
(25, 9, 2, '37345-testvideo.mp4', 'video/mp4', 1, 'Test after divs in uploads', 'COOL'),
(26, 10, 4, '32457-testvideo.mp4', 'video/mp4', 1, 'Hello test', 'Test test test'),
(27, 11, 1, '48210-testvideo.mp4', 'video/mp4', 1, 'asdsad', 'asdasdasd'),
(28, 12, 4, '66724-testvideo.mp4', 'video/mp4', 1, 'Test', 'testtttttt'),
(29, 13, 1, '24248-testvideo.mp4', 'video/mp4', 1, 'hello', 'hello'),
(30, 14, 4, '83193-testvideo.mp4', 'video/mp4', 1, 'Redewsign', 'Hello World, This is a test with a box instead of a line');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datafiles`
--
ALTER TABLE `datafiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `datafiles`
--
ALTER TABLE `datafiles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id_video` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
