SET NAMES 'utf8mb4' COLLATE 'utf8mb4_unicode_ci';

DROP DATABASE IF EXISTS web;
CREATE DATABASE IF NOT EXISTS web CHARACTER SET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

USE web;

CREATE TABLE IF NOT EXISTS `posts` (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
    `post-title` VARCHAR(100) NOT NULL,
    `post-subtitle` VARCHAR(100) NOT NULL,
    `author` VARCHAR(50) NOT NULL,
    `date` VARCHAR(50) NOT NULL,
    `article` TEXT NOT NULL,
    `hash` VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `comments` (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
    `articleID` INTEGER NOT NULL,
    `comment` TEXT NOT NULL,
    `author` VARCHAR(50) NOT NULL,
    `date` VARCHAR(50) NOT NULL,
    `hash` VARCHAR(50) NOT NULL,
    `score` INTEGER NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `backend_users` (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(30) NOT NULL,
    `password` VARCHAR(72) NOT NULL,
    `isadmin` INTEGER NOT NULL,
    `imageURL` VARCHAR(72) DEFAULT 'https://www.gravatar.com/avatar/c2dc195c07fcd533dc73c72886aa55ba?s=50',
    `description` TEXT NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `posts`
(`post-title`, `post-subtitle`, `author`, `date`, `article`, `hash`)
VALUES
('Man must explore, and this is exploration at its greatest', 'Problems look mighty small from 150 miles up', 'admin', '2022/01/02 18:32:30', "<p>Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe, a round earth in which all the directions eventually meet, in which there is no center because every point, or none, is center — an equal earth which all men occupy as equals. The airman\'s earth, if free men make it, will be truly round: a globe in practice, not in theory.</p>
                        <p>Science cuts two ways, of course; its products can be used for both good and evil. But there\'s no turning back from science. The early warnings about technological dangers also come from science.</p>
                        <p>What was most significant about the lunar voyage was not that man set foot on the Moon but that they set eye on the earth.</p>
                        <p>A Chinese tale tells of some men sent to harm a young girl who, upon seeing her beauty, become her protectors rather than her violators. That\'s how I felt seeing the Earth for the first time. I could not help but love and cherish her.</p>
                        <p>For those who have seen the Earth from space, and for the hundreds and perhaps thousands more who will, the experience most certainly changes your perspective. The things that we share in our world are far more valuable than those which divide us.</p>
                        <h2 class=\"section-heading\">The Final Frontier</h2>
                        <p>There can be no thought of finishing for \"aiming for the stars.\" Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.</p>
                        <p>There can be no thought of finishing for ‘aiming for the stars.’ Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.</p>
                        <blockquote class=\"blockquote\">The dreams of yesterday are the hopes of today and the reality of tomorrow. Science has not yet mastered prophecy. We predict too much for the next year and yet far too little for the next ten.</blockquote>
                        <p>Spaceflights cannot be stopped. This is not the work of any one man or even a group of men. It is a historical process which mankind is carrying out in accordance with the natural laws of human development.</p>
                        <h2 class=\"section-heading\">Reaching for the Stars</h2>
                        <p>As we got further and further away, it [the Earth] diminished in size. Finally it shrank to the size of a marble, the most beautiful you can imagine. That beautiful, warm, living object looked so fragile, so delicate, that if you touched it with a finger it would crumble and fall apart. Seeing this has to change a man.</p>
                        <a href=\"#!\"><img class=\"img-fluid\" src=\"assets/img/post-sample-image.jpg\" alt=\"...\" /></a>
                        <span class=\"caption text-muted\">To go places and do things that have never been done before – that’s what living is all about.</span>
                        <p>Space, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before.</p>
                        <p>As I stand out here in the wonders of the unknown at Hadley, I sort of realize there’s a fundamental truth to our nature, Man must explore, and this is exploration at its greatest.</p>
                        <p>
                            Placeholder text by
                            <a href=\"http://spaceipsum.com/\">Space Ipsum</a>
                            &middot; Images by
                            <a href=\"https://www.flickr.com/photos/nasacommons/\">NASA on The Commons</a>
                        </p>", "0cc175b9c0f1b6a831c399e269772661");

INSERT INTO `comments`
(`author`, `comment`, `date`, `articleID`, `hash`)
VALUES
("admin", "This is my first comment!", "2022/01/01 18:32:30", 1, "0cc175b9c0f1b6a831c399e269772661"),
("admin", "This is my second comment!", "2022/01/01 18:33:29", 1, "92eb5ffee6ae2fec3ad71c777531578f"),
("admin", "This is my third comment!", "2022/01/01 18:48:19", 1, "4a8a08f09d37b73795649038408b5f33");

INSERT INTO `backend_users`
(`username`, `password`, `isadmin`, `description`)
VALUES
("admin", "admin", 1, "admin test account"),
("guest", "guest", 0, "guest test account");

REVOKE ALL ON *.* FROM web_user;
REVOKE ALL ON web.* FROM web_user;
GRANT SELECT ON web.* TO web_user;
GRANT INSERT, UPDATE, DELETE ON web.* TO web_user;
