DROP TABLE books;
CREATE TABLE books (
    id              INTEGER PRIMARY KEY NOT NULL,
    name            TEXT NOT NULL,
    authour         TEXT NOT NULL,
    series_name     TEXT,
    genre           TEXT
);

-- # FANTASY
INSERT INTO books VALUES (NULL, "The Fellowship of the Ring", "J.R.R. Tolkien", "Middle-Earth/Lord of the Rings", "High Fantasy");
INSERT INTO books VALUES (NULL, "The Two Towers", "J.R.R. Tolkien", "Middle-Earth/Lord of the Rings", "High Fantasy");
INSERT INTO books VALUES (NULL, "Return of the King", "J.R.R. Tolkien", "Middle-Earth/Lord of the Rings", "High Fantasy");
INSERT INTO books VALUES (NULL, "The History of Middle Earth I", "J.R.R. Tolkien/Christopher Tolkien", "Middle-Earth/History of Middle-Earth", "High Fantasy");
INSERT INTO books VALUES (NULL, "The History of Middle Earth II", "J.R.R. Tolkien/Christopher Tolkien", "Middle-Earth/History of Middle-Earth", "High Fantasy");
INSERT INTO books VALUES (NULL, "The History of Middle Earth III", "J.R.R. Tolkien/Christopher Tolkien", "Middle-Earth/History of Middle-Earth", "High Fantasy");
INSERT INTO books VALUES (NULL, "The Silmarillion", "J.R.R. Tolkien/Christopher Tolkien", "Middle-Earth", "High Fantasy");
INSERT INTO books VALUES (NULL, "The Silmarillion", "J.R.R. Tolkien/Christopher Tolkien", "Middle-Earth", "High Fantasy");
INSERT INTO books VALUES (NULL, "The Book of Lost Tales I", "J.R.R. Tolkien/Christopher Tolkien", "Middle-Earth", "High Fantasy");
INSERT INTO books VALUES (NULL, "The Book of Lost Tales II", "J.R.R. Tolkien/Christopher Tolkien", "Middle-Earth", "High Fantasy");
INSERT INTO books VALUES (NULL, "The Lays of Beleriand", "J.R.R. Tolkien/Christopher Tolkien", "Middle-Earth", "High Fantasy");
INSERT INTO books VALUES (NULL, "Unfinished Tales", "J.R.R. Tolkien/Christopher Tolkien", "Middle-Earth", "High Fantasy");
INSERT INTO books VALUES (NULL, "The Children of Hurin", "J.R.R. Tolkien/Christopher Tolkien", "Middle-Earth", "High Fantasy");
INSERT INTO books VALUES (NULL, "The Hobbit", "J.R.R. Tolkien", "Middle-Earth", "High Fantasy");
INSERT INTO books VALUES (NULL, "Tales from the Perilous Realm", "J.R.R. Tolkien", NULL, "High Fantasy");
INSERT INTO books VALUES (NULL, "The Legend of Sigurd & Gudrun", "J.R.R. Tolkien/Christopher Tolkien", NULL, "High Fantasy");
INSERT INTO books VALUES (NULL, "The Complete Guide to Middle-Earth", "Robert Foster", "Middle-Earth", "Reference/High Fantasy");
INSERT INTO books VALUES (NULL, "Letters from Father Christmas", "J.R.R. Tolkien/Baillie Tolkien", NULL, "High Fantasy");
INSERT INTO books VALUES (NULL, "Master of Middle-Earth the achievements of J.R.R Tolkien", "Paul Kocher", NULL, "Reference/High Fantasy");
INSERT INTO books VALUES (NULL, "Beowulf", "Unknown/J.R.R. Tolkien/Christopher Tolkien", NULL, "High Fantasy");
INSERT INTO books VALUES (NULL, "The Story of Kullervo", "J.R.R. Tolkien/Christopher Tolkien", NULL, "High Fantasy");
INSERT INTO books VALUES (NULL, "The Fall of Arthur", "J.R.R. Tolkien/Christopher Tolkien", NULL, "High Fantasy");
INSERT INTO books VALUES (NULL, "The Fall of Gondolin", "J.R.R. Tolkien/Christopher Tolkien", "Middle-Earth", "High Fantasy");
INSERT INTO books VALUES (NULL, "A Tolkien Bestiary", "David Day", "Middle-Earth", "Reference/High Fantasy");
INSERT INTO books VALUES (NULL, "The Lord of the Rings: Weapons and Warfare", "Chris Smith", "Middle-Earth", "Reference/High Fantasy");

INSERT INTO books VALUES (NULL, "The Calling", "David Gaider", "Dragon Age", "Fantasy");
INSERT INTO books VALUES (NULL, "The Stolen Throne", "David Gaider", "Dragon Age", "Fantasy");

INSERT INTO books VALUES (NULL, "The Last Wish", "Andrzej Sapkowski", "The Witcher", "Fantasy");

INSERT INTO books VALUES (NULL, "Before the Storm", "Christie Golden", "World of Warcraft", "Fantasy");

INSERT INTO books VALUES (NULL, "First King of Shannara", "Terry Brooks", "Shannara", "High Fantasy");
INSERT INTO books VALUES (NULL, "The Sword of Shannara", "Terry Brooks", "Shannara/The Sword of Shannara", "High Fantasy");
INSERT INTO books VALUES (NULL, "The Elfstones of Shannara", "Terry Brooks", "Shannara/The Sword of Shannara", "High Fantasy");
INSERT INTO books VALUES (NULL, "The Wishsong of Shannara", "Terry Brooks", "Shannara/The Sword of Shannara", "High Fantasy");
INSERT INTO books VALUES (NULL, "The Scions of Shannara", "Terry Brooks", "Shannara/Heritage of Shannara", "High Fantasy");
INSERT INTO books VALUES (NULL, "The Druid of Shannara", "Terry Brooks", "Shannara/Heritage of Shannara", "High Fantasy");
INSERT INTO books VALUES (NULL, "The Elf Queen of Shannara", "Terry Brooks", "Shannara/Heritage of Shannara", "High Fantasy");
INSERT INTO books VALUES (NULL, "The Talismans of Shannara", "Terry Brooks", "Shannara/Heritage of Shannara", "High Fantasy");
INSERT INTO books VALUES (NULL, "Ilse Witch", "Terry Brooks", "Shannara/The Voyage of the Jerle Shannara", "High Fantasy");
INSERT INTO books VALUES (NULL, "Wards of Faerie", "Terry Brooks", "Shannara/The Dark Legacy of Shannara", "High Fantasy");
INSERT INTO books VALUES (NULL, "Bloodfire Quest", "Terry Brooks", "Shannara/The Dark Legacy of Shannara", "High Fantasy");
INSERT INTO books VALUES (NULL, "Witch Wraith", "Terry Brooks", "Shannara/The Dark Legacy of Shannara", "High Fantasy");

INSERT INTO books VALUES (NULL, "The Field Guide", "Tony DiTrelizzi/Holly Black", "The Spiderwick Chronicles", "Fantasy");
INSERT INTO books VALUES (NULL, "The Seeing Stone", "Tony DiTrelizzi/Holly Black", "The Spiderwick Chronicles", "Fantasy");
INSERT INTO books VALUES (NULL, "Lucinda's Secret", "Tony DiTrelizzi/Holly Black", "The Spiderwick Chronicles", "Fantasy");
INSERT INTO books VALUES (NULL, "The Ironwood Tree", "Tony DiTrelizzi/Holly Black", "The Spiderwick Chronicles", "Fantasy");
INSERT INTO books VALUES (NULL, "The Wrath of Mulgarath", "Tony DiTrelizzi/Holly Black", "The Spiderwick Chronicles", "Fantasy");
INSERT INTO books VALUES (NULL, "The Nixie's Song", "Tony DiTrelizzi/Holly Black", "Beyond The Spiderwick Chronicles", "Fantasy");

INSERT INTO books VALUES (NULL, "The Lightning Thief", "Rick Riordan", "Percy Jackson & the Olympians", "Fantasy");
INSERT INTO books VALUES (NULL, "The Sea of Monsters", "Rick Riordan", "Percy Jackson & the Olympians", "Fantasy");
INSERT INTO books VALUES (NULL, "The Titan's Curse", "Rick Riordan", "Percy Jackson & the Olympians", "Fantasy");
INSERT INTO books VALUES (NULL, "The Battle of the Labyrinth", "Rick Riordan", "Percy Jackson & the Olympians", "Fantasy");
INSERT INTO books VALUES (NULL, "The Last Olympian", "Rick Riordan", "Percy Jackson & the Olympians", "Fantasy");
INSERT INTO books VALUES (NULL, "The Greek Gods", "Rick Riordan", "Percy Jackson", "Fantasy");
INSERT INTO books VALUES (NULL, "The Lost Hero", "Rick Riordan", "The Heroes of Olympus", "Fantasy");
INSERT INTO books VALUES (NULL, "The Son of Neptune", "Rick Riordan", "The Heroes of Olympus", "Fantasy");
INSERT INTO books VALUES (NULL, "The Red Pyramid", "Rick Riordan", "The Kane Chronicles", "Fantasy");

INSERT INTO books VALUES (NULL, "Sea of Death", "Gary Gygax", "Gord the Rogue", "Fantasy");
INSERT INTO books VALUES (NULL, "Night Arrant", "Gary Gygax", "Gord the Rogue", "Fantasy");

INSERT INTO books VALUES (NULL, "Lords and Ladies", "Terry Pratchett", "Discworld/Witches", "Fantasy");
INSERT INTO books VALUES (NULL, "Wyrd Sisters", "Terry Pratchett", "Discworld/Witches", "Fantasy");

INSERT INTO books VALUES (NULL, "Test of the Twins", "Margaret Weis/Tracy Hickman", "DragonLance/Legends", "Fantasy");
INSERT INTO books VALUES (NULL, "Theros Ironfeld", "Don Perrin", "DragonLance/The Warriors", "Fantasy");
INSERT INTO books VALUES (NULL, "Conundrum", "Jeff Crook", "DragonLance/Age of Mortals", "Fantasy");
INSERT INTO books VALUES (NULL, "The Lake of Death", "Jean Rabe", "DragonLance/Age of Mortals", "Fantasy");
INSERT INTO books VALUES (NULL, "Darkness & Light", "Paul B. Thompson/Tonya Carter Cook", "DragonLance/Preludes", "Fantasy");
INSERT INTO books VALUES (NULL, "Kendermore", "Mary Kirchoff", "DragonLance/Preludes", "Fantasy");
INSERT INTO books VALUES (NULL, "Flint the King", "Mary Kirchoff/Douglas Niles", "DragonLance/Preludes", "Fantasy");
INSERT INTO books VALUES (NULL, "Tanis, the Shadow Years", "Barbara Siegel/Scott Siegel", "DragonLance/Preludes", "Fantasy");
INSERT INTO books VALUES (NULL, "The Rose and the Skull", "Jeff Crook", "DragonLance/Bridge of Time", "Fantasy");
INSERT INTO books VALUES (NULL, "Firstborn", "Paul B. Thompson/Tonya C. Cook", "DragonLance/Elven Nations", "Fantasy");
INSERT INTO books VALUES (NULL, "The Kinslayer Wars", "Douglas Niles", "DragonLance/Elven Nations", "Fantasy");
INSERT INTO books VALUES (NULL, "The Qualinesti", "Paul B. Thompson/Tonya C. Cook", "DragonLance/Elven Nations", "Fantasy");
INSERT INTO books VALUES (NULL, "The Messenger", "Douglas Niles", "DragonLance/Icewall", "Fantasy");
INSERT INTO books VALUES (NULL, "The Middle of Nowhere", "Paul B. Thompson", "DragonLance/Crossroads", "Fantasy");
INSERT INTO books VALUES (NULL, "Children of the Plains", "Tonya C. Cook/Paul B. Thompson", "DragonLance/Barbarians", "Fantasy");
INSERT INTO books VALUES (NULL, "The Inheritance", "Nancy Varian Berberick", "DragonLance/Classics", "Fantasy");
INSERT INTO books VALUES (NULL, "The Seventh Sentinel", "Mary Kirchoff", "DragonLance/Defenders of Magic", "Fantasy");
INSERT INTO books VALUES (NULL, "The Medusa Plague", "Mary Kirchoff", "DragonLance/Defenders of Magic", "Fantasy");
INSERT INTO books VALUES (NULL, "Dragons of a Autumn Twilight", "Margaret Weis/Tracy Hickman", "DragonLance/The Chronicles", "Fantasy");
INSERT INTO books VALUES (NULL, "Dragons of a Winter Night", "Margaret Weis/Tracy Hickman", "DragonLance/The Chronicles", "Fantasy");
INSERT INTO books VALUES (NULL, "Dragons of a Spring Dawning", "Margaret Weis/Tracy Hickman", "DragonLance/The Chronicles", "Fantasy");
INSERT INTO books VALUES (NULL, "Dragons of a Summer Flame", "Margaret Weis/Tracy Hickman", "DragonLance/The Chronicles: The Second Generation", "Fantasy");
INSERT INTO books VALUES (NULL, "Dragons of a Vanished Moon", "Margaret Weis/Tracy Hickman", "DragonLance/The War of Souls", "Fantasy");
INSERT INTO books VALUES (NULL, "Dragons of a Fallen Sun", "Margaret Weis/Tracy Hickman", "DragonLance/The War of Souls", "Fantasy");

INSERT INTO books VALUES (NULL, "Wizard's First Rule", "Terry Goodkind", "Sword of Truth", "High Fantasy");
INSERT INTO books VALUES (NULL, "Stone of Tears", "Terry Goodkind", "Sword of Truth", "High Fantasy");
INSERT INTO books VALUES (NULL, "Blood of the Fold", "Terry Goodkind", "Sword of Truth", "High Fantasy");
INSERT INTO books VALUES (NULL, "Temple of the Winds", "Terry Goodkind", "Sword of Truth", "High Fantasy");
INSERT INTO books VALUES (NULL, "Soul of the Fire", "Terry Goodkind", "Sword of Truth", "High Fantasy");
INSERT INTO books VALUES (NULL, "Faith of the Fallen", "Terry Goodkind", "Sword of Truth", "High Fantasy");

INSERT INTO books VALUES (NULL, "Forging the Darksword", "Margaret Weis/Tracy Hickman", "Darksword Trilogy", "Fantasy");
INSERT INTO books VALUES (NULL, "Doom of the Darksword", "Margaret Weis/Tracy Hickman", "Darksword Trilogy", "Fantasy");
INSERT INTO books VALUES (NULL, "Triumph of the Darksword", "Margaret Weis/Tracy Hickman", "Darksword Trilogy", "Fantasy");

INSERT INTO books VALUES (NULL, "The First Chronicles of Thomas Covenant the Unbeliever", "Stephen Donaldson", "The Chronicles of Thomas Covenant", "High Fantasy");
INSERT INTO books VALUES (NULL, "The Wounded Land", "Stephen Donaldson", "The Second Chronicles of Thomas Covenant", "High Fantasy");
INSERT INTO books VALUES (NULL, "The One Tree", "Stephen Donaldson", "The Second Chronicles of Thomas Covenant", "High Fantasy");
INSERT INTO books VALUES (NULL, "White Gold Wielder", "Stephen Donaldson", "The Second Chronicles of Thomas Covenant", "High Fantasy");

INSERT INTO books VALUES (NULL, "Homeland", "R.A. Salvatore", "Forgotten Realms/The Dark Elf Trilogy", "Fantasy");
INSERT INTO books VALUES (NULL, "Shadowdale", "Scott Ciencin", "Forgotten Realms/The Avatar Series", "Fantasy");
INSERT INTO books VALUES (NULL, "Exile", "R.A. Salvatore", "Forgotten Realms/The Dark Elf Trilogy", "Fantasy");
INSERT INTO books VALUES (NULL, "In Sylvan Shadows", "R.A. Salvatore", "Forgotten Realms/The Cleric Quintet", "Fantasy");
INSERT INTO books VALUES (NULL, "Night Masks", "R.A. Salvatore", "Forgotten Realms/The Cleric Quintet", "Fantasy");
INSERT INTO books VALUES (NULL, "The Fallen Fortress", "R.A. Salvatore", "Forgotten Realms/The Cleric Quintet", "Fantasy");
INSERT INTO books VALUES (NULL, "The Chaos Curse", "R.A. Salvatore", "Forgotten Realms/The Cleric Quintet", "Fantasy");
INSERT INTO books VALUES (NULL, "The Legacy", "R.A. Salvatore", "Forgotten Realms/Legacy of the Drow", "Fantasy");
INSERT INTO books VALUES (NULL, "Starless Night", "R.A. Salvatore", "Forgotten Realms/Legacy of the Drow", "Fantasy");
INSERT INTO books VALUES (NULL, "Silverfall", "Ed Greenwood", "Forgotten Realms", "Fantasy");

INSERT INTO books VALUES (NULL, "Eragon", "Christopher Paolini", "The Inheritance Cycle", "Fantasy");
INSERT INTO books VALUES (NULL, "Eldest", "Christopher Paolini", "The Inheritance Cycle", "Fantasy");
INSERT INTO books VALUES (NULL, "Inheritance", "Christopher Paolini", "The Inheritance Cycle", "Fantasy");
INSERT INTO books VALUES (NULL, "Brisinger", "Christopher Paolini", "The Inheritance Cycle", "Fantasy");

INSERT INTO books VALUES (NULL, "The Burning Bridge", "John Flanagan", "Ranger's Apprentice", "Fantasy");
INSERT INTO books VALUES (NULL, "The Icebound Land", "John Flanagan", "Ranger's Apprentice", "Fantasy");
INSERT INTO books VALUES (NULL, "Oakleaf Bearers", "John Flanagan", "Ranger's Apprentice", "Fantasy");
INSERT INTO books VALUES (NULL, "The Sorcerer in the North", "John Flanagan", "Ranger's Apprentice", "Fantasy");
INSERT INTO books VALUES (NULL, "The Royal Ranger", "John Flanagan", "Ranger's Apprentice", "Fantasy");

INSERT INTO books VALUES (NULL, "The Stone Mage & the Sea", "Sean Williams", "The Change", "Fantasy");
INSERT INTO books VALUES (NULL, "The Sky Warden & the Sun", "Sean Williams", "The Change", "Fantasy");
INSERT INTO books VALUES (NULL, "The Storm Weaver & the Sand", "Sean Williams", "The Change", "Fantasy");

INSERT INTO books VALUES (NULL, "The Spook's Apprentice", "Joseph Delaney", "Spooks/The Wardstone Chronicles", "Fantasy");
INSERT INTO books VALUES (NULL, "The Spook's Curse", "Joseph Delaney", "Spooks/The Wardstone Chronicles", "Fantasy");
INSERT INTO books VALUES (NULL, "The Spook's Secret", "Joseph Delaney", "Spooks/The Wardstone Chronicles", "Fantasy");
INSERT INTO books VALUES (NULL, "The Spook's Battle", "Joseph Delaney", "Spooks/The Wardstone Chronicles", "Fantasy");
INSERT INTO books VALUES (NULL, "Spook's: Alice", "Joseph Delaney", "Spooks/The Wardstone Chronicles", "Fantasy");

INSERT INTO books VALUES (NULL, "His Dark Materials", "Philip Pullman", "His Dark Materials", "Fantasy");

INSERT INTO books VALUES (NULL, "The Forests of Silence", "Emily Rodda", "Deltora Quest", "Fantasy/Children");
INSERT INTO books VALUES (NULL, "The Lake of Tears", "Emily Rodda", "Deltora Ques/", "Fantasy/Children");
INSERT INTO books VALUES (NULL, "City of the Rats", "Emily Rodda", "Deltora Quest", "Fantasy/Children");
INSERT INTO books VALUES (NULL, "The Shifting Sands", "Emily Rodda", "Deltora Quest", "Fantasy/Children");
INSERT INTO books VALUES (NULL, "Dread Mountain", "Emily Rodda", "Deltora Quest", "Fantasy/Children");
INSERT INTO books VALUES (NULL, "The Maze of the Beast", "Emily Rodda", "Deltora Quest", "Fantasy/Children");
INSERT INTO books VALUES (NULL, "The Valley of the Lost", "Emily Rodda", "Deltora Quest", "Fantasy/Children");
INSERT INTO books VALUES (NULL, "Return to Del", "Emily Rodda", "Deltora Quest", "Fantasy/Children");
INSERT INTO books VALUES (NULL, "Cavern of The Fear", "Emily Rodda", "Deltora Quest/Deltora Shadowlands", "Fantasy/Children");
INSERT INTO books VALUES (NULL, "The Isle of Illusion", "Emily Rodda", "Deltora Quest/Deltora Shadowlands", "Fantasy/Children");
INSERT INTO books VALUES (NULL, "The Shadowlands", "Emily Rodda", "Deltora Quest/Deltora Shadowlands", "Fantasy/Children");
INSERT INTO books VALUES (NULL, "Deltora Quest 3", "Emily Rodda", "Deltora Quest/Dragons of Deltora", "Fantasy/Children");
INSERT INTO books VALUES (NULL, "The Key to Rondo", "Emily Rodda", "Rondo", "Fantasy");
INSERT INTO books VALUES (NULL, "The Land of Dragons", "Emily Rodda", "Deltora", "Fantasy");

INSERT INTO books VALUES (NULL, "Slaves of Quentaris", "Paul Collins", "The Quentaris Chronicles", "Fantasy");
INSERT INTO books VALUES (NULL, "The Skyflower", "Justin D'Ath", "The Quentaris Chronicles", "Fantasy");
INSERT INTO books VALUES (NULL, "Pirates of Quentaris", "Sherryl Clark", "The Quentaris Chronicles", "Fantasy");

INSERT INTO books VALUES (NULL, "The Alchemyst", "Michael Scott", "The Secrets of the Immortal Nicholas Flamel", "Fantasy");

INSERT INTO books VALUES (NULL, "Coraline", "Neil Gaiman", NULL, "Fantasy/Dark");

INSERT INTO books VALUES (NULL, "Skulduggery Pleasant", "Derek Landy", "Skulduggery Pleasant", "Fantasy/Dark");
INSERT INTO books VALUES (NULL, "Playing with Fire", "Derek Landy", "Skulduggery Pleasant", "Fantasy/Dark");
INSERT INTO books VALUES (NULL, "The Faceless Ones", "Derek Landy", "Skulduggery Pleasant", "Fantasy/Dark");
INSERT INTO books VALUES (NULL, "Dark Days", "Derek Landy", "Skulduggery Pleasant", "Fantasy/Dark");
INSERT INTO books VALUES (NULL, "Mortal Coil", "Derek Landy", "Skulduggery Pleasant", "Fantasy/Dark");
INSERT INTO books VALUES (NULL, "Death Bringer", "Derek Landy", "Skulduggery Pleasant", "Fantasy/Dark");
INSERT INTO books VALUES (NULL, "Kingdom of the Wicked", "Derek Landy", "Skulduggery Pleasant", "Fantasy/Dark");
INSERT INTO books VALUES (NULL, "Last Stand of Dead Men", "Derek Landy", "Skulduggery Pleasant", "Fantasy/Dark");
INSERT INTO books VALUES (NULL, "The End of the World", "Derek Landy", "Skulduggery Pleasant", "Fantasy/Dark");
INSERT INTO books VALUES (NULL, "Armageddon Outta Here", "Derek Landy", "Skulduggery Pleasant", "Fantasy/Dark");

INSERT INTO books VALUES (NULL, "City of Bones", "Cassandra Clare", "The Mortal Instruments", "Fantasy/Young Adult");
INSERT INTO books VALUES (NULL, "City of Ashes", "Cassandra Clare", "The Mortal Instruments", "Fantasy/Young Adult");
INSERT INTO books VALUES (NULL, "City of Glass", "Cassandra Clare", "The Mortal Instruments", "Fantasy/Young Adult");
INSERT INTO books VALUES (NULL, "City of Fallen Angels", "Cassandra Clare", "The Mortal Instruments", "Fantasy/Young Adult");
INSERT INTO books VALUES (NULL, "City of Lost Souls", "Cassandra Clare", "The Mortal Instruments", "Fantasy/Young Adult");
INSERT INTO books VALUES (NULL, "City of Heavenly Fire", "Cassandra Clare", "The Mortal Instruments", "Fantasy/Young Adult");

INSERT INTO books VALUES (NULL, "The Barbed Coil", "J.V. Jones", NULL, "Fantasy");
INSERT INTO books VALUES (NULL, "Tales of Taormin", "Cheryl J. Franklin", "Taormin", "Fantasy");
INSERT INTO books VALUES (NULL, "The Madness of Hallen", "Russell Meek", "The Khalada Stone", "Fantasy");
INSERT INTO books VALUES (NULL, "The Space Wolf", "William King", "Warhammer 40,000", "Fantasy/Science Fiction");

INSERT INTO books VALUES (NULL, "Artemis Fowl", "Eoin Colfer", "The Fowl Adventures", "Fantasy/Children");
INSERT INTO books VALUES (NULL, "The Arctic Incident", "Eoin Colfer", "The Fowl Adventures", "Fantasy/Children");
INSERT INTO books VALUES (NULL, "The Lost Colony", "Eoin Colfer", "The Fowl Adventures", "Fantasy/Children");

INSERT INTO books VALUES (NULL, "Miss Peregrine's Home for Peculiar Children", "Ransom Riggs", NULL, "Fantasy/Young Adult");

INSERT INTO books VALUES (NULL, "Deathly Hallows", "J.K. Rowling", "Harry Potter", "Fantasy");

INSERT INTO books VALUES (NULL, "Magyk", "Angie Sage", "Septimus Heap", "Fantasy");
INSERT INTO books VALUES (NULL, "Flyte", "Angie Sage", "Septimus Heap", "Fantasy");
INSERT INTO books VALUES (NULL, "Physik", "Angie Sage", "Septimus Heap", "Fantasy");

INSERT INTO books VALUES (NULL, "The Sea of Mist", "Mel Odom", "Might and Magic", "Fantasy");

INSERT INTO books VALUES (NULL, "The Diamond Throne", "David Eddings", "The Elenium", "Fantasy");
INSERT INTO books VALUES (NULL, "The Shining Ones", "David Eddings", "The Tamuli", "Fantasy");

INSERT INTO books VALUES (NULL, "Dark Lord of Geeragh", "Veronica Sweeney", NULL, "Fantasy/Children");

INSERT INTO books VALUES (NULL, "Zenith", "Dirk Strasser", "Books of Ascension", "Fantasy");

INSERT INTO books VALUES (NULL, "The Chronicles of Narnia", "C.S. Lewis", "Narnia", "Fantasy");

-- # SCI FY
INSERT INTO books VALUES (NULL, "Divergent", "Veronica Roth", "Divergent", "Science Fiction");
INSERT INTO books VALUES (NULL, "Insurgent", "Veronica Roth", "Divergent", "Science Fiction");
INSERT INTO books VALUES (NULL, "Allegiant", "Veronica Roth", "Divergent", "Science Fiction");
INSERT INTO books VALUES (NULL, "Four", "Veronica Roth", "Divergent", "Science Fiction");

INSERT INTO books VALUES (NULL, "The Maze Runner", "James Dashner", "The Maze Runner", "Science Fiction");
INSERT INTO books VALUES (NULL, "The Scorch Trials", "James Dashner", "The Maze Runner", "Science Fiction");
INSERT INTO books VALUES (NULL, "The Death Cure", "James Dashner", "The Maze Runner", "Science Fiction");

INSERT INTO books VALUES (NULL, "The Hunger Games", "Suzanne Collins", "The Hunger Games", "Science Fiction");
INSERT INTO books VALUES (NULL, "Catching Fire", "Suzanne Collins", "The Hunger Games", "Science Fiction");
INSERT INTO books VALUES (NULL, "Mockingjay", "Suzanne Collins", "The Hunger Games", "Science Fiction");

INSERT INTO books VALUES (NULL, "Red Rising", "Pierce Brown", "Red Rising", "Science Fiction");

INSERT INTO books VALUES (NULL, "Armor", "John Steakley", NULL, "Science Fiction");

INSERT INTO books VALUES (NULL, "Ready Player One", "Ernest Cline", NULL, "Science Fiction");

INSERT INTO books VALUES (NULL, "Ender's Game", "Orson Scott Card", "Ender's Game", "Science Fiction");

INSERT INTO books VALUES (NULL, "Mortal Engines", "Philip Reeve", "Mortal Engines", "Science Fiction");

INSERT INTO books VALUES (NULL, "Dune", "Frank Herbert", "Dune", "Science Fiction");
INSERT INTO books VALUES (NULL, "Chapter House Dune", "Frank Herbert", "Dune", "Science Fiction");
INSERT INTO books VALUES (NULL, "God Emperor of Dune", "Frank Herbert", "Dune", "Science Fiction");
INSERT INTO books VALUES (NULL, "Children of Dune", "Frank Herbert", "Dune", "Science Fiction");
INSERT INTO books VALUES (NULL, "Dune Messiah", "Frank Herbert", "Dune", "Science Fiction");
INSERT INTO books VALUES (NULL, "Heretics of Dune", "Frank Herbert", "Dune", "Science Fiction");

INSERT INTO books VALUES (NULL, "David Starr, Space Ranger", "Isaac Asimov", "Lucky Starr", "Science Fiction");
INSERT INTO books VALUES (NULL, "Lucky Starr and the Pirates of the Asteroids", "Isaac Asimov", "Lucky Starr", "Science Fiction");
INSERT INTO books VALUES (NULL, "Lucky Starr and the Oceans of Venus", "Isaac Asimov", "Lucky Starr", "Science Fiction");
INSERT INTO books VALUES (NULL, "Lucky Starr and the Big Sun of Mercury", "Isaac Asimov", "Lucky Starr", "Science Fiction");
INSERT INTO books VALUES (NULL, "Lucky Starr and the Moons of Jupiter", "Isaac Asimov", "Lucky Starr", "Science Fiction");
INSERT INTO books VALUES (NULL, "Lucky Starr and the Rings of Saturn", "Isaac Asimov", "Lucky Starr", "Science Fiction");
INSERT INTO books VALUES (NULL, "Pebble in the Sky", "Isaac Asimov", "Galactic Empire", "Science Fiction");
INSERT INTO books VALUES (NULL, "The End of Eternity", "Isaac Asimov", NULL, "Science Fiction");
INSERT INTO books VALUES (NULL, "The Naked Sun", "Isaac Asimov", "Robot", "Science Fiction");
INSERT INTO books VALUES (NULL, "The Robots of Dawn", "Isaac Asimov", "Robot", "Science Fiction");
INSERT INTO books VALUES (NULL, "Robot Dreams", "Isaac Asimov", NULL, "Science Fiction");
INSERT INTO books VALUES (NULL, "Foundation and Earth", "Isaac Asimov", "Foundation", "Science Fiction");
INSERT INTO books VALUES (NULL, "Frontiers", "Isaac Asimov", NULL, "Science Fiction");

-- # Fiction
INSERT INTO books VALUES (NULL, "The Recruit", "Robert Muchamore", "CHERUB", "Fiction/Spy");
INSERT INTO books VALUES (NULL, "Class A", "Robert Muchamore", "CHERUB", "Fiction/Spy");
INSERT INTO books VALUES (NULL, "Maximum Security", "Robert Muchamore", "CHERUB", "Fiction/Spy");
INSERT INTO books VALUES (NULL, "The Killing", "Robert Muchamore", "CHERUB", "Fiction/Spy");
INSERT INTO books VALUES (NULL, "Divine Madness", "Robert Muchamore", "CHERUB", "Fiction/Spy");
INSERT INTO books VALUES (NULL, "Man vs Beast", "Robert Muchamore", "CHERUB", "Fiction/Spy");
INSERT INTO books VALUES (NULL, "The Fall", "Robert Muchamore", "CHERUB", "Fiction/Spy");
INSERT INTO books VALUES (NULL, "Mad Dogs", "Robert Muchamore", "CHERUB", "Fiction/Spy");
INSERT INTO books VALUES (NULL, "The Sleepwalker", "Robert Muchamore", "CHERUB", "Fiction/Spy");
INSERT INTO books VALUES (NULL, "The General", "Robert Muchamore", "CHERUB", "Fiction/Spy");
INSERT INTO books VALUES (NULL, "Brigands M.C.", "Robert Muchamore", "CHERUB", "Fiction/Spy");
INSERT INTO books VALUES (NULL, "Shadow Wave", "Robert Muchamore", "CHERUB", "Fiction/Spy");

INSERT INTO books VALUES (NULL, "Ice Station", "Matthew Reilly", "Shane Schofield", "Fiction/Action");
INSERT INTO books VALUES (NULL, "Area 7", "Matthew Reilly", "Shane Schofield", "Fiction/Action");
INSERT INTO books VALUES (NULL, "Scarecrow", "Matthew Reilly", "Shane Schofield", "Fiction/Action");
INSERT INTO books VALUES (NULL, "Hell Island", "Matthew Reilly", "Shane Schofield", "Fiction/Action");
INSERT INTO books VALUES (NULL, "Scarecrow and the Army of Thieves", "Matthew Reilly", "Shane Schofield", "Fiction/Action");
INSERT INTO books VALUES (NULL, "Seven Ancient Wonders", "Matthew Reilly", "Jack West Jr", "Fiction/Action");
INSERT INTO books VALUES (NULL, "The Six Sacred Stones", "Matthew Reilly", "Jack West Jr", "Fiction/Action");
INSERT INTO books VALUES (NULL, "The Five Greatest Warriors", "Matthew Reilly", "Jack West Jr", "Fiction/Action");
INSERT INTO books VALUES (NULL, "The Tournament", "Matthew Reilly", NULL, "Fiction/Action");
INSERT INTO books VALUES (NULL, "The Great Zoo of China", "Matthew Reilly", NULL, "Fiction/Action");

INSERT INTO books VALUES (NULL, "The Spoiler", "Annalena McAfee", NULL, "Fiction");
INSERT INTO books VALUES (NULL, "The Wild Things", "Dave Eggers", NULL, "Fiction");
INSERT INTO books VALUES (NULL, "Life of Pi", "Yann Martel", NULL, "Fiction/Philosophical");
INSERT INTO books VALUES (NULL, "Perfume", "Patrick Süskind", NULL, "Fiction/Horror/Mystery");
INSERT INTO books VALUES (NULL, "The Reader", "Bernhard Schlink", NULL, "Fiction");
INSERT INTO books VALUES (NULL, "Parvana", "Deborah Ellis", NULL, "Fiction/Children");
INSERT INTO books VALUES (NULL, "The Heaven Shop", "Deborah Ellis", NULL, "Fiction");
INSERT INTO books VALUES (NULL, "The God of Small Things", "Arundhati Roy", NULL, "Fiction");
INSERT INTO books VALUES (NULL, "The Messenger", "Markus Zusak", NULL, "Fiction");
INSERT INTO books VALUES (NULL, "Lord of the Flies", "William Golding", NULL, "Fiction/Allegorical");
INSERT INTO books VALUES (NULL, "A Clockwork Orange", "Anthony Burgess", NULL, "Science Fiction/Dystopian");
INSERT INTO books VALUES (NULL, "The Outsider", "Albert Camus", NULL, "Fiction/Young Adult");
INSERT INTO books VALUES (NULL, "The Lost World", "Michael Crichton", "Jurassic Park", "Science Fiction");
INSERT INTO books VALUES (NULL, "Coorinna", "Erle Wilson", NULL, "Fiction/Historical");
INSERT INTO books VALUES (NULL, "The Dalai Lama's Book of Wisdom", "Dalai Lama", NULL, "Self-help");
INSERT INTO books VALUES (NULL, "The Art of War", "Sun-tzu", NULL, "Military");
INSERT INTO books VALUES (NULL, "The Absolutely True Diary of a Part-Time Indian", "Sherman Alexie", NULL, "Fiction/Young Adult");
INSERT INTO books VALUES (NULL, "Teacher's Pet", "Morris Gleitzman", NULL, "Fiction/Children");
INSERT INTO books VALUES (NULL, "The Big Big Big Book of Tashi", "Anna Fienberg/Barbara Fienberg/Kim Gamble", "Tashi", "Fiction/Children");
INSERT INTO books VALUES (NULL, "Don't Call me Ishmael!", "Michael Gerard Bauer", NULL, "Fiction/Young Adult");
INSERT INTO books VALUES (NULL, "The One Hundred Year Old Mand who Climbed out the Window and Disappeared", "Jonas Jonasson", "Hundred-Year-Old Man", "Fiction/Satire");
INSERT INTO books VALUES (NULL, "Paper Towns", "John Green", NULL, "Fiction/Young Adult");
INSERT INTO books VALUES (NULL, "Let it Snow", "John Green/Maureen Johnson/Lauren Myracle", NULL, "Fiction/Young Adult");
INSERT INTO books VALUES (NULL, "An Abundance of Katherines", "John Green", NULL, "Fiction/Young Adult");
INSERT INTO books VALUES (NULL, "Turtles all the way Down", "John Green", NULL, "Fiction/Young Adult");
INSERT INTO books VALUES (NULL, "The Fault in our Stars", "John Green", NULL, "Fiction/Young Adult");
INSERT INTO books VALUES (NULL, "Will Grayson, Will Grayson", "John Green", NULL, "Fiction/Young Adult");
INSERT INTO books VALUES (NULL, "Looking for Alaska", "John Green", NULL, "Fiction/Young Adult");
INSERT INTO books VALUES (NULL, "The Subtle Art of Not Giving a Fuck", "Mark Manson", NULL, "Self-help");
INSERT INTO books VALUES (NULL, "Everything is Fucked", "Mark Manson", NULL, "Self-help");

INSERT INTO books VALUES (NULL, "Dragonology", "Dugald Steer", "Ology", "Fantasy");
INSERT INTO books VALUES (NULL, "Egyptology", "Dugald Steer", "Ology", "Fantasy");
INSERT INTO books VALUES (NULL, "Wizardology", "Dugald Steer", "Ology", "Fantasy");
INSERT INTO books VALUES (NULL, "Pirateology", "Dugald Steer", "Ology", "Fantasy");
INSERT INTO books VALUES (NULL, "Monsterology", "Dugald Steer", "Ology", "Fantasy");
INSERT INTO books VALUES (NULL, "Vampireology", "Dugald Steer", "Ology", "Fantasy");

INSERT INTO books VALUES (NULL, "Wizards and Witches", "Brendan Lehane", "The Enchanted World", "Mythology/Fable");
INSERT INTO books VALUES (NULL, "Aesop's Fables", "Aesop", NULL, "Fabel");
INSERT INTO books VALUES (NULL, "Tales from the Mabinogion", "Gwyn Thomas", NULL, "Fable");
INSERT INTO books VALUES (NULL, "Yertle the Turtle and Other Stories", "Dr. Seuss", "Dr. Seuss", "Children");
INSERT INTO books VALUES (NULL, "Just so Stories", "Rudyard Kipling", NULL, "Fairy Tale/Children");
INSERT INTO books VALUES (NULL, "Ghost", "Louise Welsh/Others", NULL, "Folklore/Horror");
INSERT INTO books VALUES (NULL, "The Complete Grimm's Fairy Tales", "Jacob Grimm/Wilhelm Grimm", NULL, "Fairy Tale/Folklore");
INSERT INTO books VALUES (NULL, "Myths and Legends", "Hamish Hamilton/Jacynth Hope-Simpson", NULL, "Mythology/Folklore");
INSERT INTO books VALUES (NULL, "Gods and Heroes", "Michael Foss", NULL, "Mythology");
INSERT INTO books VALUES (NULL, "Fairly Wicked Tales", "Stacey Turner", NULL, "Fairy Tale/Fable/Horror");

INSERT INTO books VALUES (NULL, "The Bad Beginning", "Lemony Snicket", "A Series of Unfortunate Events", "Fiction/Children");
INSERT INTO books VALUES (NULL, "The Reptile Room", "Lemony Snicket", "A Series of Unfortunate Events", "Fiction/Children");
INSERT INTO books VALUES (NULL, "The Wide Window", "Lemony Snicket", "A Series of Unfortunate Events", "Fiction/Children");
INSERT INTO books VALUES (NULL, "The Miserable Mill", "Lemony Snicket", "A Series of Unfortunate Events", "Fiction/Children");
INSERT INTO books VALUES (NULL, "The Austere Academy", "Lemony Snicket", "A Series of Unfortunate Events", "Fiction/Children");
INSERT INTO books VALUES (NULL, "The Ersatz Elevator", "Lemony Snicket", "A Series of Unfortunate Events", "Fiction/Children");
INSERT INTO books VALUES (NULL, "The Vile Village", "Lemony Snicket", "A Series of Unfortunate Events", "Fiction/Children");
INSERT INTO books VALUES (NULL, "The Hostile Hospital", "Lemony Snicket", "A Series of Unfortunate Events", "Fiction/Children");
INSERT INTO books VALUES (NULL, "The Carnivorous Carnival", "Lemony Snicket", "A Series of Unfortunate Events", "Fiction/Children");
INSERT INTO books VALUES (NULL, "The Slippery Slope", "Lemony Snicket", "A Series of Unfortunate Events", "Fiction/Children");
INSERT INTO books VALUES (NULL, "The Grim Grotto", "Lemony Snicket", "A Series of Unfortunate Events", "Fiction/Children");
INSERT INTO books VALUES (NULL, "The Penultimate Peril", "Lemony Snicket", "A Series of Unfortunate Events", "Fiction/Children");
INSERT INTO books VALUES (NULL, "The End", "Lemony Snicket", "A Series of Unfortunate Events", "Fiction/Children");

INSERT INTO books VALUES (NULL, "Family Bible", "Unknown", NULL, "Nonfiction/Reference");
INSERT INTO books VALUES (NULL, "Mao's Last Dancer", "Li Cunxin", NULL, "Nonfiction/Memoir");
INSERT INTO books VALUES (NULL, "Is this Anything?", "Jerry Seinfeld", NULL, "Nonfiction/Comedy");
INSERT INTO books VALUES (NULL, "From Snow to Ash", "Anthony Sharwood", NULL, "Nonfiction/Memoir");
INSERT INTO books VALUES (NULL, "The Kon-Tiki Expedition", "Thor Heyerdahl", NULL, "Nonfiction/Memoir");
INSERT INTO books VALUES (NULL, "Mein Kampf", "Adolf Hitler", NULL, "Nonfiction/Autobiography");
INSERT INTO books VALUES (NULL, "Half a Lifetime", "Judith Wright", NULL, "Nonfiction/Biography");
INSERT INTO books VALUES (NULL, "Invictus", "John Carlin", NULL, "Nonfiction/Sport");
INSERT INTO books VALUES (NULL, "Bravo Two Zero", "Andy McNab", NULL, "Nonfiction/Military/Memoir");
INSERT INTO books VALUES (NULL, "Wild Swans", "Jung Chang", NULL, "Nonfiction/Biography");
INSERT INTO books VALUES (NULL, "Balzac and the Little Chinese Seamstress", "Dai Sijie", NULL, "Fiction/Autobiographical");
INSERT INTO books VALUES (NULL, "A.B. 'Banjo' Patterson's Collected Verse", "A.B. 'Banjo' Patterson", NULL, "Poem");
INSERT INTO books VALUES (NULL, "Much Ado About Nothing", "William Shakespeare/Emma Vieceli", NULL, "Play");
INSERT INTO books VALUES (NULL, "A Doll's House", "Henrik Ibsen", NULL, "Play");
INSERT INTO books VALUES (NULL, "McCarthy's Bar", "Pete McCarthy", NULL, "Nonfiction/Travel");
INSERT INTO books VALUES (NULL, "Mystery of a Convent and Maria Monk", "Maria Monk", NULL, "Nonfiction");
INSERT INTO books VALUES (NULL, "The Quest of the Holy Grail", "Unknown/P.M. Matarasso", NULL, "Fiction/Mythology");
INSERT INTO books VALUES (NULL, "Treasure Island and the Black Arrow", "Robert Louis Stevenson", NULL, "Fiction");
INSERT INTO books VALUES (NULL, "Beowulf", "Unknown/David Wright", NULL, "Poem");
INSERT INTO books VALUES (NULL, "Ivanhoe", "Sir Walter Scott", NULL, "Fiction");
INSERT INTO books VALUES (NULL, "Robinson Crusoe", "Daniel Defoe", NULL, "Fiction");
INSERT INTO books VALUES (NULL, "King Arthur and the Knights of the Round Table", "Antonia Pakenham", NULL, "Fiction");
INSERT INTO books VALUES (NULL, "Such is Life", "Tom Collins", NULL, "Fiction/Historical");
INSERT INTO books VALUES (NULL, "Alice in Wonderland", "Lewis Carrol", NULL, "Fantasy/Children");
INSERT INTO books VALUES (NULL, "Gulliver's Travels", "Jonathon Swift", NULL, "Fantasy/Satire");
INSERT INTO books VALUES (NULL, "Moby Dick", "Herman Melville", NULL, "Fiction/Historical");

INSERT INTO books VALUES (NULL, "Lost Languages", "W. Andrew Robinson", NULL, "Nonfiction");
INSERT INTO books VALUES (NULL, "The Dangerous Book for Boys", "Hal Iggulden", NULL, "Nonfiction");
INSERT INTO books VALUES (NULL, "On Becoming a Man", "Harold Shryock", NULL, "Nonfiction");
INSERT INTO books VALUES (NULL, "The Complete Hoyle Revised", "Edmond Hoyle", NULL, "Reference");
INSERT INTO books VALUES (NULL, "101 Amazing Card Tricks", "Bob Longe", NULL, "Reference");
INSERT INTO books VALUES (NULL, "GO: A Complete Introduction to the Game", "Cho Chikun", NULL, "Reference");
INSERT INTO books VALUES (NULL, "The Second Book of GO", "Richard Bozulich", NULL, "Reference");
INSERT INTO books VALUES (NULL, "South Australian Recreational Boating Safety Handbook", "Government of South Australia", NULL, "Reference");
INSERT INTO books VALUES (NULL, "Construction Handbook", "Mojang", "Minecraft", "Reference/Game");
INSERT INTO books VALUES (NULL, "Redstone Handbook", "Mojang", "Minecraft", "Reference/Game");
INSERT INTO books VALUES (NULL, "Combat Handbook", "Mojang", "Minecraft", "Reference/Game");
INSERT INTO books VALUES (NULL, "Australian Oxford Dictionary", "Oxford", NULL, "Reference");
INSERT INTO books VALUES (NULL, "Runic Inscriptions", "Paul Johnson", NULL, "Reference");
INSERT INTO books VALUES (NULL, "The Little Book of Foreign Swear Words", "Sid Dinch", NULL, "Reference");
INSERT INTO books VALUES (NULL, "Holy Bible", "Unknown", NULL, "Reference");
INSERT INTO books VALUES (NULL, "Great Encyclopaedic Dictionary v1", "Reader's Digest", "Great Encyclopaedic Dictionary", "Reference");
INSERT INTO books VALUES (NULL, "Great Encyclopaedic Dictionary v2", "Reader's Digest", "Great Encyclopaedic Dictionary", "Reference");
INSERT INTO books VALUES (NULL, "Great Encyclopaedic Dictionary v3", "Reader's Digest", "Great Encyclopaedic Dictionary", "Reference");
INSERT INTO books VALUES (NULL, "The Pathfinder", "James Fenimore Cooper", NULL, "Fiction/Historical");
INSERT INTO books VALUES (NULL, "The Raven", "Peter Landesman", NULL, "Fiction/Historical");
INSERT INTO books VALUES (NULL, "All Quiet on the Westernfront", "Erich Maria Remarque", NULL, "Fiction/Military");
INSERT INTO books VALUES (NULL, "Private Peaceful", "Michael Morpurgo", NULL, "Fiction/Military");
INSERT INTO books VALUES (NULL, "Fire Down Below", "William Golding", NULL, "Fiction/Historical");
INSERT INTO books VALUES (NULL, "Destroy Carthage", "David Gibbins", "Total War: Rome", "Fiction/Historical");
INSERT INTO books VALUES (NULL, "Relics", "Pip Caughan-Hughes", NULL, "Fiction/Historical");
INSERT INTO books VALUES (NULL, "Queen of Swords", "Sara Donati", NULL, "Fiction/Historical");
INSERT INTO books VALUES (NULL, "The Song of the Gladiator", "Paul Doherty", NULL, "Fiction/Historical");

INSERT INTO books VALUES (NULL, "The Feynman Lectures on Physics v1", "Richard Feynman", "The Feynman Lectures on Physics", "Reference/Physics");
INSERT INTO books VALUES (NULL, "The Feynman Lectures on Physics v2", "Richard Feynman", "The Feynman Lectures on Physics", "Reference/Physics");
INSERT INTO books VALUES (NULL, "The Feynman Lectures on Physics v3", "Richard Feynman", "The Feynman Lectures on Physics", "Reference/Physics");
INSERT INTO books VALUES (NULL, "Mathematical Insights", "Dippy C. Olijnyk", NULL, "Reference/Mathematics");
INSERT INTO books VALUES (NULL, "Giancoli 6th Edition", "Pearson", NULL, "Reference/Mathematics");
INSERT INTO books VALUES (NULL, "The Calculus with Analytic Geometry 3rd Edition", "Leithold", NULL, "Reference/Mathematics");
INSERT INTO books VALUES (NULL, "Nuclear Physics and Introduction", "Burcham", NULL, "Reference/Physics");
INSERT INTO books VALUES (NULL, "The Nature of Matter", "Ginestra Amaldi", NULL, "Reference/Physics");
INSERT INTO books VALUES (NULL, "50 Physics Ideas", "Joanne Baker", NULL, "Reference/Physics");
INSERT INTO books VALUES (NULL, "Feynman's Tips on Physics", "Richard Feynman", NULL, "Reference/Physics");
INSERT INTO books VALUES (NULL, "Selections from the Principle of Relativity", "Einstein/Hawking", NULL, "Reference/Physics");
INSERT INTO books VALUES (NULL, "Fractals", "Hand Lauwerier", NULL, "Reference/Mathematics");
INSERT INTO books VALUES (NULL, "QED", "Richard Feynman", NULL, "Reference/Physics");
INSERT INTO books VALUES (NULL, "Particles and Accelerators", "Gouiran", NULL, "Reference/Physics");
INSERT INTO books VALUES (NULL, "Chaos", "James Gleich", NULL, "Reference/Mathematics");
INSERT INTO books VALUES (NULL, "Astronomy 2nd Edition", "Ebbighausen/Merrill", NULL, "Reference/Space");
INSERT INTO books VALUES (NULL, "The Elements of Probability Theory", "Cramer", NULL, "Reference/Mathematics");
INSERT INTO books VALUES (NULL, "Elementary Linear Algebra 2nd Edition", "Anton", NULL, "Reference/Mathematics");
INSERT INTO books VALUES (NULL, "All the Best from the Australian Mathematics Competition", "Unknown", NULL, "Reference/Mathematics");
INSERT INTO books VALUES (NULL, "Methods of Logic", "Quine", NULL, "Reference/Logic");
INSERT INTO books VALUES (NULL, "Symbolic Logic", "Copi", NULL, "Reference/Logic");
INSERT INTO books VALUES (NULL, "Labyrinths of Reason", "William Poundstone", NULL, "Reference/Logic");
INSERT INTO books VALUES (NULL, "God Created the Integers", "Stephen Hawking", NULL, "Reference/Mathematics");
INSERT INTO books VALUES (NULL, "The Lady of the Tiger?", "Raymond Smullyan", NULL, "Fiction");
INSERT INTO books VALUES (NULL, "Pitman's Shorthand Instructor", "Pitman", NULL, "Reference");
INSERT INTO books VALUES (NULL, "Lateral Thinking Puzzles", "Main Street", NULL, "Reference/Mathematics");
INSERT INTO books VALUES (NULL, "Max n'aime pas lire", "Ainsi Va La Vie", NULL, "Reference/French");
INSERT INTO books VALUES (NULL, "Mind-Boggling Tricky Logic Puzzles", "Unknown", NULL, "Reference/Logic");
INSERT INTO books VALUES (NULL, "I.Q. Puzzles", "Unknown", NULL, "Reference/Logic");
INSERT INTO books VALUES (NULL, "The Book of Total Genius", "Mensa", NULL, "Reference/Logic");
INSERT INTO books VALUES (NULL, "Learning to Rock Climb", "Loughman", NULL, "Reference/Climbing");

INSERT INTO books VALUES (NULL, "Greece and Rome at War", "Connollo", NULL, "Reference/Military");
INSERT INTO books VALUES (NULL, "Soldiering On", "Australian War Memorial", NULL, "Reference/Military");
INSERT INTO books VALUES (NULL, "A History of Antarctica", "Stephen Martin", NULL, "Reference/History");
INSERT INTO books VALUES (NULL, "Damn the Dardanelles", "John Laffin", NULL, "Reference/Military");
INSERT INTO books VALUES (NULL, "This England v1", "I. Tenen", "This England", "Reference/History");
INSERT INTO books VALUES (NULL, "This England v2", "I. Tenen", "This England", "Reference/History");
INSERT INTO books VALUES (NULL, "The Gathering Storm", "Winston S. Churchill", "The Second World War", "Reference/History");
INSERT INTO books VALUES (NULL, "Their Finest Hour", "Winston S. Churchill", "The Second World War", "Reference/History");
INSERT INTO books VALUES (NULL, "The Grand Alliance", "Winston S. Churchill", "The Second World War", "Reference/History");
INSERT INTO books VALUES (NULL, "The Hinge of Fate", "Winston S. Churchill", "The Second World War", "Reference/History");
INSERT INTO books VALUES (NULL, "A Dictionary of Chivalry", "Longmans", NULL, "Reference");
INSERT INTO books VALUES (NULL, "4 Ingredients 2", "Kim McCosker/Rachael Bermingham", NULL, "Reference/Cooking");
INSERT INTO books VALUES (NULL, "Legions of Middle-Earth", "Games Workshop", NULL, "Reference/Wargaming");
INSERT INTO books VALUES (NULL, "Guinness World Records 2010 Gamer's", "Guinness World Records", NULL, "Reference");
INSERT INTO books VALUES (NULL, "Pokemon FireRed & LeafGreen Guide", "Unknown", NULL, "Reference/Game");
INSERT INTO books VALUES (NULL, "Swimming & Lifesaving", "Royal Life Saving", NULL, "Reference");
INSERT INTO books VALUES (NULL, "Gemstones of the Southern Continents", "Sutherland", NULL, "Reference/Geology");
INSERT INTO books VALUES (NULL, "Amazing Planet Earth", "Farndon/Challoner/Kerror/Walshaw", NULL, "Reference");
INSERT INTO books VALUES (NULL, "Atlas 5th Edition", "Heinemann", NULL, "Reference");
INSERT INTO books VALUES (NULL, "Rock Climbing Guide to Southern Grampians", "V.C.C", NULL, "Reference/Climbing");
INSERT INTO books VALUES (NULL, "Moonarie", "CCSA/Tony Barker", NULL, "Reference/Climbing");
INSERT INTO books VALUES (NULL, "Rockclimbs around Adelaide", "AUMC/Nyrie Dodd", NULL, "Reference/Climbing");
INSERT INTO books VALUES (NULL, "A Rock Climber's Guide to the Flinders Rangers", "Nick Neagle", NULL, "Reference/Climbing");
INSERT INTO books VALUES (NULL, "Kaputar", "Mark Colyvan", NULL, "Reference/Climbing");
INSERT INTO books VALUES (NULL, "A Manual of Modern Rope Techniques", "Nigel Shepherd", NULL, "Reference/Climbing");
INSERT INTO books VALUES (NULL, "Modern Alpine Climbing", "Pit Schubert", NULL, "Reference/Climbing");
INSERT INTO books VALUES (NULL, "Modern Rope Techniques", "Bill March", NULL, "Reference/Climbing");
INSERT INTO books VALUES (NULL, "Advanced Rockcraft", "Royal Robbins", NULL, "Reference/Climbing");
INSERT INTO books VALUES (NULL, "Abseiling Handbook", "NZ Mountain Safety Council", NULL, "Reference/Climbing");
INSERT INTO books VALUES (NULL, "The Basic Essentials of Rock Climbing", "Mike Strassman", NULL, "Reference/Climbing");
INSERT INTO books VALUES (NULL, "How to Rock Climb!", "John Long", NULL, "Reference/Climbing");
INSERT INTO books VALUES (NULL, "How to Gym Climb", "John Long", NULL, "Reference/Climbing");
INSERT INTO books VALUES (NULL, "Rock Climbing", "John Barry/Nigel Shepherd", NULL, "Reference/Climbing");
INSERT INTO books VALUES (NULL, "Submarine Design & Engineering", "BMT", NULL, "Reference/Engineering");

-- # D&D
INSERT INTO books VALUES (NULL, "Art & Arcana", "Michael Witwer/Kyle Newman/Sam Witwer", "Dungeons & Dragons", "Reference/Art");
INSERT INTO books VALUES (NULL, "The Chronicles of Exandria: The Tale of Vox Machina", "Critical Role", NULL, "Reference/Art");
INSERT INTO books VALUES (NULL, "Dungeon Masters Guide (5E)", "Wizards of the Coast", "Dungeons & Dragons/5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Xanathar's Guide to Everything (5E)", "Wizards of the Coast", "Dungeons & Dragons/5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Tasha's Cauldron of Everything (5E)", "Wizards of the Coast", "Dungeons & Dragons/5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Player's Handbook (5E)", "Wizards of the Coast", "Dungeons & Dragons/5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Monster Manual (5E)", "Wizards of the Coast", "Dungeons & Dragons/5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Volo's Guide to Monsters (5E)", "Wizards of the Coast", "Dungeons & Dragons/5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Mordenkainen's Tome of Foes (5E)", "Wizards of the Coast", "Dungeons & Dragons/5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Guildmasters' Gude to Ravnica (5E)", "Wizards of the Coast", "Dungeons & Dragons/5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Baldur's Gate: Descent into Avernus (5E)", "Wizards of the Coast", "Dungeons & Dragons/5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Sword Coast Adventurer's Guide (5E)", "Wizards of the Coast", "Dungeons & Dragons/5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Ghosts of Saltmarsh (5E)", "Wizards of the Coast", "Dungeons & Dragons/5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Curse of Strahd (5E)", "Wizards of the Coast", "Dungeons & Dragons/5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Tales from the Yawning Portal (5E)", "Wizards of the Coast", "Dungeons & Dragons/5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Icewind Dale: Rime of the Frostmaiden (5E)", "Wizards of the Coast", "Dungeons & Dragons/5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Van Richten's Guide to Ravenloft (5E)", "Wizards of the Coast", "Dungeons & Dragons/5E", "Reference/Game");

INSERT INTO books VALUES (NULL, "Ultimate Bestiary: The Dreaded Accursed (5E)", "Nord Games", "Dungeons & Dragons/5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Tome of Beasts II (5E)", "Kobold Press", "Dungeons & Dragons/5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Strongholds & Followers (5E)", "MCDM", "Dungeons & Dragons/5E", "Reference/Game");

INSERT INTO books VALUES (NULL, "Adventures in Middle-Earth: Players Guide (5E)", "Cubicle 7", "Dungeons & Dragons/5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Adventures in Middle-Earth: Loremaster's Guide (5E)", "Cubicle 7", "Dungeons & Dragons/5E", "Reference/Game");

INSERT INTO books VALUES (NULL, "Out of the Box Encounters (5E)", "Nerdarchy", "Dungeons & Dragons/5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Menagerie of Magic (5E)", "Greedy Mimic Games", "Dungeons & Dragons/5E", "Reference/Game");

INSERT INTO books VALUES (NULL, "Worlds and Monsters (4E)", "Wizards of the Coast", "Dungeons & Dragons/4E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Player's Handbook Races: Tieflings (4E)", "Wizards of the Coast", "Dungeons & Dragons/4E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Assault on Nightwyrm Fortress (4E)", "Wizards of the Coast", "Dungeons & Dragons/4E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Kingdom of the Ghouls (4E)", "Wizards of the Coast", "Dungeons & Dragons/4E", "Reference/Game");
INSERT INTO books VALUES (NULL, "The Book fo Vile Darkness (4E)", "Wizards of the Coast", "Dungeons & Dragons/4E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Eberron Campaign Guide (4E)", "Wizards of the Coast", "Dungeons & Dragons/4E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Neverwinter Campaign Setting (4E)", "Wizards of the Coast", "Dungeons & Dragons/4E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Revenge of the Giants (4E)", "Wizards of the Coast", "Dungeons & Dragons/4E", "Reference/Game");
INSERT INTO books VALUES (NULL, "The Plane Below: Secrets of the Elemental Chaos (4E)", "Wizards of the Coast", "Dungeons & Dragons/4E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Tomb of Horrors (4E)", "Wizards of the Coast", "Dungeons & Dragons/4E", "Reference/Game");

INSERT INTO books VALUES (NULL, "Monster Manual (3.5E)", "Wizards of the Coast", "Dungeons & Dragons/3.5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Player's Handbook (3.5E)", "Wizards of the Coast", "Dungeons & Dragons/3.5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Dungeon Masters Guide (3.5E)", "Wizards of the Coast", "Dungeons & Dragons/3.5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Complete Adventurer (3.5E)", "Wizards of the Coast", "Dungeons & Dragons/3.5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Complete Warrior (3.5E)", "Wizards of the Coast", "Dungeons & Dragons/3.5E", "Reference/Game");

INSERT INTO books VALUES (NULL, "Monster Manual (3E)", "Wizards of the Coast", "Dungeons & Dragons/3E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Dungeon Master's Guide (3E)", "Wizards of the Coast", "Dungeons & Dragons/3E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Forgotten Realms Campaign Setting (3E)", "Wizards of the Coast", "Dungeons & Dragons/3E", "Reference/Game");

INSERT INTO books VALUES (NULL, "Dungeon Master's Guide (2E)", "Wizards of the Coast", "Dungeons & Dragons/2E", "Reference/Game");

INSERT INTO books VALUES (NULL, "Monster Manual (1.5E)", "Wizards of the Coast", "Dungeons & Dragons/1.5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Monster Manual II (1.5E)", "Wizards of the Coast", "Dungeons & Dragons/1.5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Forgotten Realms: Dreams of the Red Wizards (1.5E)", "Wizards of the Coast", "Dungeons & Dragons/1.5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Forgotten Realms: Cyclopedia of the Realms (1.5E)", "Wizards of the Coast", "Dungeons & Dragons/1.5E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Forgotten Realms: DM's Sourcebook of the Realms (1.5E)", "Wizards of the Coast", "Dungeons & Dragons/1.5E", "Reference/Game");

INSERT INTO books VALUES (NULL, "Basic Rules Set 1 (1E)", "Wizards of the Coast", "Dungeons & Dragons/1E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Night Below: An Underrk Campaign (1E)", "Wizards of the Coast", "Dungeons & Dragons/1E", "Reference/Game");

INSERT INTO books VALUES (NULL, "Advanced Player's Guide (P1)", "Paizo", "Pathfinder/1E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Bestiary (P1)", "Paizo", "Pathfinder/1E", "Reference/Game");
INSERT INTO books VALUES (NULL, "Core Rulebook (P1)", "Paizo", "Pathfinder/1E", "Reference/Game");

INSERT INTO books VALUES (NULL, "Numenera", "Monte Cook Games", NULL, "Reference/Game");

INSERT INTO books VALUES (NULL, "The Monsters Know What They're Doing", "Keith Ammann", "Dungeons & Dragons", "Reference/Game");
INSERT INTO books VALUES (NULL, "Live to Tell the Tale", "Keith Ammann", "Dungeons & Dragons", "Reference/Game");
INSERT INTO books VALUES (NULL, "Game Angry: How to RPG the Angry Way", "Scott Rehm", NULL, "Reference/Game");

INSERT INTO books VALUES (NULL, "Fizban's Treasury of Dragons (5E)", "Wizards of the Coast", "Dungeons & Dragons/5E", "Reference/Game");
