<?php

//Connect to the database
echo "Connecting to the database...", PHP_EOL;

$servername = "YOUR-SERVERNAME-HERE";
$username = "YOUR-USERNAME-HERE";
$password = "YOUR-PASSWORD-HERE";
$dbname = "YOUR-DBNAME-HERE";
$port = "5432";

$conn_string = "host=$servername port=$port dbname=$dbname user=$username password=$password";
$conn = pg_pconnect($conn_string);

//Number of entries in the tables (to be inserted - 777 entries in this example)
$entriesNumber = 777-1;

//Arrays for random values: firstNames, mailServices, lastNames, colours, materials, countries, languages, streets, drinks, machine_types
echo "Adding arrays...", PHP_EOL;

$firstNames = array("Noah", "Liam", "Mason", "Jacob", "William", "Ethan", "James", "Alexander", "Michael", "Benjamin", "Elijah", "Daniel", "Aiden", "Logan", "Matthew", "Lucas", "Jackson", "David", "Oliver", "Jayden", "Joseph", "Gabriel", "Samuel", "Carter", "Anthony", "John", "Dylan", "Luke", "Henry", "Andrew", "Isaac", "Christopher", "Joshua", "Wyatt", "Sebastian", "Owen", "Caleb", "Nathan", "Ryan", "Jack", "Hunter", "Levi", "Christian", "Jaxon", "Julian", "Landon", "Grayson", "Jonathan", "Isaiah", "Charles", "Thomas", "Aaron", "Eli", "Connor", "Jeremiah", "Cameron", "Josiah", "Adrian", "Colton", "Jordan", "Brayden", "Nicholas", "Robert", "Angel", "Hudson", "Lincoln", "Evan", "Dominic", "Austin", "Gavin", "Nolan", "Parker", "Adam", "Chase", "Jace", "Ian", "Cooper", "Easton", "Kevin", "Jose", "Tyler", "Brandon", "Asher", "Jaxson", "Mateo", "Jason", "Ayden", "Zachary", "Carson", "Xavier", "Leo", "Ezra", "Bentley", "Sawyer", "Kayden", "Blake", "Nathaniel", "Ryder", "Theodore", "Elias", "Emma", "Olivia", "Sophia", "Ava", "Isabella", "Mia", "Abigail", "Emily", "Charlotte", "Harper", "Madison", "Amelia", "Elizabeth", "Sofia", "Evelyn", "Avery", "Chloe", "Ella", "Grace", "Victoria", "Aubrey", "Scarlett", "Zoey", "Addison", "Lily", "Lillian", "Natalie", "Hannah", "Aria", "Layla", "Brooklyn", "Alexa", "Zoe", "Penelope", "Riley", "Leah", "Audrey", "Savannah", "Allison", "Samantha", "Nora", "Skylar", "Camila", "Anna", "Paisley", "Ariana", "Ellie", "Aaliyah", "Claire", "Violet", "Stella", "Sadie", "Mila", "Gabriella", "Lucy", "Arianna", "Kennedy", "Sarah", "Madelyn", "Eleanor", "Kaylee", "Caroline", "Hazel", "Hailey", "Genesis", "Kylie", "Autumn", "Piper", "Maya", "Nevaeh", "Serenity", "Peyton", "Mackenzie", "Bella", "Eva", "Taylor", "Naomi", "Aubree", "Aurora", "Melanie", "Lydia", "Brianna", "Ruby", "Katherine", "Ashley", "Alexis", "Alice", "Cora", "Julia", "Madeline", "Faith", "Annabelle", "Alyssa", "Isabelle", "Vivian", "Gianna", "Quinn", "Clara", "Reagan", "Khloe");
$mailServices = array("@aol.com", "@att.net", "@comcast.net", "@facebook.com", "@gmail.com", "@gmx.com", "@googlemail.com", "@google.com", "@hotmail.com", "@hotmail.co.uk", "@mac.com", "@me.com", "@mail.com", "@msn.com", "@live.com", "@sbcglobal.net", "@verizon.net", "@yahoo.com", "@yahoo.co.uk", "@gmx.com");
$lastNames = array ("Smith", "Jones", "Taylor", "Williams", "Brown", "Davies", "Evans", "Wilson", "Thomas", "Roberts", "Johnson", "Lewis", "Walker", "Robinson", "Wood", "Thompson", "White", "Watson", "Jackson", "Wright", "Green", "Harris", "Cooper", "King", "Lee", "Martin", "Clarke", "James", "Morgan", "Hughes", "Edwards", "Hill", "Moore", "Clark", "Harrison", "Scott", "Young", "Morris", "Hall", "Ward", "Turner", "Carter", "Phillips", "Mitchell", "Patel", "Adams", "Campbell", "Anderson", "Allen", "Cook", "Bailey", "Parker", "Miller", "Davis", "Murphy", "Price", "Bell", "Baker", "Griffiths", "Kelly", "Simpson", "Marshall", "Collins", "Bennett", "Cox", "Richardson", "Fox", "Gray", "Rose", "Chapman", "Hunt", "Robertson", "Shaw", "Reynolds", "Lloyd", "Ellis", "Richards", "Russell", "Wilkinson", "Khan", "Graham", "Stewart", "Reid", "Murray", "Powell", "Palmer", "Holmes", "Rogers", "Stevens", "Walsh", "Hunter", "Thomson", "Matthews", "Ross", "Owen", "Mason", "Knight", "Kennedy", "Butler", "Saunders", "Cole", "Pearce", "Dean", "Foster", "Harvey", "Hudson", "Gibson", "Mills", "Berry", "Barnes", "Pearson", "Kaur", "Booth", "Dixon", "Grant", "Gordon", "Lane", "Harper", "Ali", "Hart", "Mcdonald", "Brooks", "Ryan", "Carr", "Macdonald", "Hamilton", "Johnston", "West", "Gill", "Dawson", "Armstrong", "Gardner", "Stone", "Andrews", "Williamson", "Barker", "George", "Fisher", "Cunningham", "Watts", "Webb", "Lawrence", "Bradley", "Jenkins", "Wells", "Chambers", "Spencer", "Poole", "Atkinson", "Lawson");
$colours = array("Absolute-zero", "Acid-green", "Aero", "Aero-blue", "African-violet", "Air-Force-blue-(RAF)", "Air-Force-blue-(USAF)", "Air-superiority-blue", "Alabama-crimson", "Alabaster", "Alice-blue", "Alien-Armpit", "Alizarin-crimson", "Alloy-orange", "Almond", "Amaranth", "Amaranth-deep-purple", "Amaranth-pink", "Amaranth-purple", "Amaranth-red", "Amazon-Store", "Amazonite", "Amber", "Amber-(SAE-ECE)", "American-rose", "Amethyst", "Android-green", "Anti-flash-white", "Antique-brass", "Antique-bronze", "Antique-fuchsia", "Antique-ruby", "Antique-white", "Ao-(English)", "Apple-Green", "Apricot", "Aqua", "Aquamarine", "Arctic-lime", "Army-green", "Arsenic", "Artichoke", "Arylide-yellow", "Ash-gray", "Asparagus", "Atomic-tangerine", "Auburn", "Aureolin", "AuroMetalSaurus", "Avocado", "Awesome", "Aztec-Gold", "Azure", "Azure-(web-color)", "Azure-mist", "Azureish-white", "Baby-blue", "Baby-blue-eyes", "Baby-pink", "Baby-powder", "Baker-Miller-pink", "Ball-blue", "Banana-Mania", "Banana-yellow", "Bangladesh-green", "Barbie-pink", "Barn-red", "Battery-Charged-Blue", "Battleship-grey", "Bazaar", "Beau-blue", "Beaver", "Begonia", "Beige", "B-dazzled-blue", "Big-dip-o’ruby", "Big-Foot-Feet", "Bisque", "Bistre", "Bistre-brown", "Bitter-lemon", "Bitter-lime", "Bittersweet", "Bittersweet-shimmer", "Black", "Black-bean", "Black-Coral", "Black-leather-jacket", "Black-olive", "Black-Shadows", "Blanched-almond", "Blast-off-bronze", "Bleu-de-France", "Blizzard-Blue", "Blond", "Blue", "Blue-(Crayola)", "Blue-(Munsell)", "Blue-(NCS)", "Blue-(Pantone)", "Blue-(pigment)", "Blue-(RYB)", "Blue-Bell", "Blue-Bolt", "Blue-gray", "Blue-green", "Blue-Jeans", "Blue-Lagoon", "Blue-magenta-violet", "Blue-sapphire", "Blue-violet", "Blue-yonder", "Blueberry", "Bluebonnet", "Blush", "Bole", "Bondi-blue", "Bone", "Booger-Buster", "Boston-University-Red", "Bottle-green", "Boysenberry", "Brandeis-blue", "Brass", "Brick-red", "Bright-cerulean", "Bright-green", "Bright-lavender", "Bright-lilac", "Bright-maroon", "Bright-navy-blue", "Bright-pink", "Bright-turquoise", "Bright-ube", "Bright-Yellow-(Crayola)", "Brilliant-azure", "Brilliant-lavender", "Brilliant-rose", "Brink-pink", "British-racing-green", "Bronze", "Bronze-Yellow", "Brown-(traditional)", "Brown-(web)", "Brown-nose", "Brown-Sugar", "Brown-Yellow", "Brunswick-green", "Bubble-gum", "Bubbles", "Bud-green", "Buff", "Bulgarian-rose", "Burgundy", "Burlywood", "Burnished-Brown", "Burnt-orange", "Burnt-sienna", "Burnt-umber", "Button-Blue", "Byzantine", "Byzantium", "Cadet", "Cadet-blue", "Cadet-grey", "Cadmium-green", "Cadmium-orange", "Cadmium-red", "Cadmium-yellow", "Café-au-lait", "Café-noir", "Cal-Poly-Pomona-green", "Cambridge-Blue", "Camel", "Cameo-pink", "Camouflage-green", "Canary", "Canary-yellow", "Candy-apple-red", "Candy-pink", "Capri", "Caput-mortuum", "Cardinal", "Caribbean-green", "Carmine", "Carmine-(M&P)", "Carmine-pink", "Carmine-red", "Carnation-pink", "Carnelian", "Carolina-blue", "Carrot-orange", "Castleton-green", "Catalina-blue", "Catawba", "Cedar-Chest", "Ceil", "Celadon", "Celadon-blue", "Celadon-green", "Celeste", "Celestial-blue", "Cerise", "Cerise-pink", "Cerulean", "Cerulean-blue", "Cerulean-frost", "CG-Blue", "CG-Red", "Chamoisee", "Champagne", "Champagne-pink", "Charcoal", "Charleston-green", "Charm-pink", "Chartreuse-(traditional)", "Chartreuse-(web)", "Cherry", "Cherry-blossom-pink", "Chestnut", "China-pink", "China-rose", "Chinese-red", "Chinese-violet", "Chlorophyll-green", "Chocolate-(traditional)", "Chocolate-(web)", "Chrome-yellow", "Cinereous", "Cinnabar", "Cinnamon[citation-needed]", "Cinnamon-Satin", "Citrine", "Citron", "Claret", "Classic-rose", "Cobalt-Blue", "Cocoa-brown", "Coconut", "Coffee", "Columbia-Blue", "Congo-pink", "Cool-Black", "Cool-grey", "Copper", "Copper-(Crayola)", "Copper-penny", "Copper-red", "Copper-rose", "Coquelicot", "Coral", "Coral-pink", "Coral-red", "Coral-Reef", "Cordovan", "Corn", "Cornell-Red", "Cornflower-blue", "Cornsilk", "Cosmic-Cobalt", "Cosmic-latte", "Coyote-brown", "Cotton-candy", "Cream", "Crimson", "Crimson-glory", "Crimson-red", "Cultured", "Cyan", "Cyan-azure", "Cyan-blue-azure", "Cyan-cobalt-blue", "Cyan-cornflower-blue", "Cyan-(process)", "Cyber-grape", "Cyber-yellow", "Cyclamen", "Daffodil", "Dandelion", "Dark-blue", "Dark-blue-gray", "Dark-brown", "Dark-brown-tangelo", "Dark-byzantium", "Dark-candy-apple-red", "Dark-cerulean", "Dark-chestnut", "Dark-coral", "Dark-cyan", "Dark-electric-blue", "Dark-goldenrod", "Dark-gray-(X11)", "Dark-green", "Dark-green-(X11)", "Dark-gunmetal", "Dark-imperial-blue", "Dark-imperial-blue", "Dark-jungle-green", "Dark-khaki", "Dark-lava", "Dark-lavender", "Dark-liver", "Dark-liver-(horses)", "Dark-magenta", "Dark-medium-gray", "Dark-midnight-blue", "Dark-moss-green", "Dark-olive-green", "Dark-orange", "Dark-orchid", "Dark-pastel-blue", "Dark-pastel-green", "Dark-pastel-purple", "Dark-pastel-red", "Dark-pink", "Dark-powder-blue", "Dark-puce", "Dark-purple", "Dark-raspberry", "Dark-red", "Dark-salmon", "Dark-scarlet", "Dark-sea-green", "Dark-sienna", "Dark-sky-blue", "Dark-slate-blue", "Dark-slate-gray", "Dark-spring-green", "Dark-tan", "Dark-tangerine", "Dark-taupe", "Dark-terra-cotta", "Dark-turquoise", "Dark-vanilla", "Dark-violet", "Dark-yellow", "Dartmouth-green", "Davys-grey", "Debian-red", "Deep-aquamarine", "Deep-carmine", "Deep-carmine-pink", "Deep-carrot-orange", "Deep-cerise", "Deep-champagne", "Deep-chestnut", "Deep-coffee", "Deep-fuchsia", "Deep-Green", "Deep-green-cyan-turquoise", "Deep-jungle-green", "Deep-koamaru", "Deep-lemon", "Deep-lilac", "Deep-magenta", "Deep-maroon", "Deep-mauve", "Deep-moss-green", "Deep-peach", "Deep-pink", "Deep-puce", "Deep-Red", "Deep-ruby", "Deep-saffron", "Deep-sky-blue", "Deep-Space-Sparkle", "Deep-spring-bud", "Deep-Taupe", "Deep-Tuscan-red", "Deep-violet", "Deer", "Denim", "Denim-Blue", "Desaturated-cyan", "Desert", "Desert-sand", "Desire", "Diamond", "Dim-gray", "Dingy-Dungeon", "Dirt", "Dodger-blue", "Dodie-yellow", "Dogwood-rose", "Dollar-bill", "Dolphin-Gray", "Donkey-brown", "Drab", "Duke-blue", "Dust-storm", "Dutch-white", "Earth-yellow", "Ebony", "Ecru", "Eerie-black", "Eggplant", "Eggshell", "Egyptian-blue", "Electric-blue", "Electric-crimson", "Electric-cyan", "Electric-green", "Electric-indigo", "Electric-lavender", "Electric-lime", "Electric-purple", "Electric-ultramarine", "Electric-violet", "Electric-yellow", "Emerald", "Eminence", "English-green", "English-lavender", "English-red", "English-vermillion", "English-violet", "Eton-blue", "Eucalyptus", "Fallow", "Falu-red", "Fandango", "Fandango-pink", "Fashion-fuchsia", "Fawn", "Feldgrau", "Feldspar", "Fern-green", "Ferrari-Red", "Field-drab", "Fiery-Rose", "Firebrick", "Fire-engine-red", "Flame", "Flamingo-pink", "Flattery", "Flavescent", "Flax", "Flirt", "Floral-white", "Fluorescent-orange", "Fluorescent-pink", "Fluorescent-yellow", "Folly", "Forest-green-(traditional)", "Forest-green-(web)", "French-beige", "French-bistre", "French-blue", "French-fuchsia", "French-lilac", "French-lime", "French-mauve", "French-pink", "French-plum", "French-puce", "French-raspberry", "French-rose", "French-sky-blue", "French-violet", "French-wine", "Fresh-Air", "Frogert", "Fuchsia", "Fuchsia-(Crayola)", "Fuchsia-pink", "Fuchsia-purple", "Fuchsia-rose", "Fulvous", "Fuzzy-Wuzzy", "Gainsboro", "Gamboge", "Gamboge-orange-(brown)", "Gargoyle-Gas", "Generic-viridian", "Ghost-white", "Giants-Club", "Giants-orange", "Ginger", "Glaucous", "Glitter", "Glossy-Grape", "GO-green", "Gold-(metallic)", "Gold-(web)-(Golden)", "Gold-Fusion", "Golden-brown", "Golden-poppy", "Golden-yellow", "Goldenrod", "Granite-Gray", "Granny-Smith-Apple", "Grape", "Gray", "Gray-(HTML/CSS-gray)", "Gray-(X11-gray)", "Gray-asparagus", "Gray-blue", "Green-(Color-Wheel)-(X11-green)", "Green-(Crayola)", "Green-(HTML/CSS-color)", "Green-(Munsell)", "Green-(NCS)", "Green-(Pantone)", "Green-(pigment)", "Green-(RYB)", "Green-blue", "Green-cyan", "Green-Lizard", "Green-Sheen", "Green-yellow", "Grizzly", "Grullo", "Guppie-green", "Gunmetal", "Halayà-úbe", "Han-blue", "Han-purple", "Hansa-yellow", "Harlequin", "Harlequin-green", "Harvard-crimson", "Harvest-gold", "Heart-Gold", "Heat-Wave", "Heidelberg-Red[2]", "Heliotrope", "Heliotrope-gray", "Heliotrope-magenta", "Hollywood-cerise", "Honeydew", "Honolulu-blue", "Hookers-green", "Hot-magenta", "Hot-pink", "Hunter-green", "Iceberg", "Icterine", "Iguana-Green", "Illuminating-Emerald", "Imperial", "Imperial-blue", "Imperial-purple", "Imperial-red", "Inchworm", "Independence", "India-green", "Indian-red", "Indian-yellow", "Indigo", "Indigo-dye", "Indigo-(web)", "Infra-Red", "Interdimensional-Blue", "International-Klein-Blue", "International-orange-(aerospace)", "International-orange-(engineering)", "International-orange-(Golden-Gate-Bridge)", "Iris", "Irresistible", "Isabelline", "Islamic-green", "Italian-sky-blue", "Ivory", "Jade", "Japanese-carmine", "Japanese-indigo", "Japanese-violet", "Jasmine", "Jasper", "Jazzberry-jam", "Jelly-Bean", "Jet", "Jonquil", "Jordy-blue", "June-bud", "Jungle-green", "Kelly-green", "Kenyan-copper", "Keppel", "Key-Lime", "Khaki-(HTML/CSS)-(Khaki)", "Khaki-(X11)-(Light-khaki)", "Kiwi", "Kobe", "Kobi", "Kobicha", "Kombu-green", "KSU-Purple", "KU-Crimson", "La-Salle-Green", "Languid-lavender", "Lapis-lazuli", "Laser-Lemon", "Laurel-green", "Lava", "Lavender-(floral)", "Lavender-(web)", "Lavender-blue", "Lavender-blush", "Lavender-gray", "Lavender-indigo", "Lavender-magenta", "Lavender-mist", "Lavender-pink", "Lavender-purple", "Lavender-rose", "Lawn-green", "Lemon", "Lemon-chiffon", "Lemon-curry", "Lemon-glacier", "Lemon-lime", "Lemon-meringue", "Lemon-yellow", "Licorice", "Liberty", "Light-apricot", "Light-blue", "Light-brown", "Light-carmine-pink", "Light-cobalt-blue", "Light-coral", "Light-cornflower-blue", "Light-crimson", "Light-cyan", "Light-deep-pink", "Light-French-beige", "Light-fuchsia-pink", "Light-goldenrod-yellow", "Light-gray", "Light-grayish-magenta", "Light-green", "Light-hot-pink", "Light-khaki", "Light-medium-orchid", "Light-moss-green", "Light-orange", "Light-orchid", "Light-pastel-purple", "Light-pink", "Light-red-ochre", "Light-salmon", "Light-salmon-pink", "Light-sea-green", "Light-sky-blue", "Light-slate-gray", "Light-steel-blue", "Light-taupe", "Light-Thulian-pink", "Light-yellow", "Lilac", "Lilac-Luster", "Lime-(color-wheel)", "Lime-(web)-(X11-green)", "Lime-green", "Limerick", "Lincoln-green", "Linen", "Loeen(lopen)look/vomit+indogo+Lopen+Gabriel", "Liseran-Purple", "Little-boy-blue", "Liver", "Liver-(dogs)", "Liver-(organ)", "Liver-chestnut", "Livid", "Lumber", "Lust", "Maastricht-Blue", "Macaroni-and-Cheese", "Madder-Lake", "Magenta", "Magenta-(Crayola)", "Magenta-(dye)", "Magenta-(Pantone)", "Magenta-(process)", "Magenta-haze", "Magenta-pink", "Magic-mint", "Magic-Potion", "Magnolia", "Mahogany", "Maize", "Majorelle-Blue", "Malachite", "Manatee", "Mandarin", "Mango-Tango", "Mantis", "Mardi-Gras", "Marigold", "Maroon-(Crayola)", "Maroon-(HTML/CSS)", "Maroon-(X11)", "Mauve", "Mauve-taupe", "Mauvelous", "Maximum-Blue", "Maximum-Blue-Green", "Maximum-Blue-Purple", "Maximum-Green", "Maximum-Green-Yellow", "Maximum-Purple", "Maximum-Red", "Maximum-Red-Purple", "Maximum-Yellow", "Maximum-Yellow-Red", "May-green", "Maya-blue", "Meat-brown", "Medium-aquamarine", "Medium-blue", "Medium-candy-apple-red", "Medium-carmine", "Medium-champagne", "Medium-electric-blue", "Medium-jungle-green", "Medium-lavender-magenta", "Medium-orchid", "Medium-Persian-blue", "Medium-purple", "Medium-red-violet", "Medium-ruby", "Medium-sea-green", "Medium-sky-blue", "Medium-slate-blue", "Medium-spring-bud", "Medium-spring-green", "Medium-taupe", "Medium-turquoise", "Medium-Tuscan-red", "Medium-vermilion", "Medium-violet-red", "Mellow-apricot", "Mellow-yellow", "Melon", "Metallic-Seaweed", "Metallic-Sunburst", "Mexican-pink", "Middle-Blue", "Middle-Blue-Green", "Middle-Blue-Purple", "Middle-Red-Purple", "Middle-Green", "Middle-Green-Yellow", "Middle-Purple", "Middle-Red", "Middle-Red-Purple", "Middle-Yellow", "Middle-Yellow-Red", "Midnight", "Midnight-blue", "Midnight-green-(eagle-green)", "Mikado-yellow", "Milk", "Mimi-Pink", "Mindaro", "Ming", "Minion-Yellow", "Mint", "Mint-cream", "Mint-green", "Misty-Moss", "Misty-rose", "Moccasin", "Mode-beige", "Moonstone-blue", "Mordant-red-19", "Morning-blue", "Moss-green", "Mountain-Meadow", "Mountbatten-pink", "MSU-Green", "Mughal-green", "Mulberry", "Mummys-Tomb", "Mustard", "Myrtle-green", "Mystic", "Mystic-Maroon", "Nadeshiko-pink", "Napier-green", "Naples-yellow", "Navajo-white", "Navy", "Navy-purple", "Neon-Carrot", "Neon-fuchsia", "Neon-green", "New-Car", "New-York-pink", "Nickel", "Non-photo-blue", "North-Texas-Green", "Nyanza", "Ocean-Blue", "Ocean-Boat-Blue", "Ocean-Green", "Ochre", "Office-green", "Ogre-Odor", "Old-burgundy", "Old-gold", "Old-heliotrope", "Old-lace", "Old-lavender", "Old-mauve", "Old-moss-green", "Old-rose", "Old-silver", "Olive", "Olive-Drab-(#3)", "Olive-Drab-#7", "Olivine", "Onyx", "Opera-mauve", "Orange-(color-wheel)", "Orange-(Crayola)", "Orange-(Pantone)", "Orange-(RYB)", "Orange-(web)", "Orange-peel", "Orange-red", "Orange-Soda", "Orange-yellow", "Orchid", "Orchid-pink", "Orioles-orange", "Otter-brown", "Outer-Space", "Outrageous-Orange", "Oxford-Blue", "OU-Crimson-Red", "Pacific-Blue", "Pakistan-green", "Palatinate-blue", "Palatinate-purple", "Pale-aqua", "Pale-blue", "Pale-brown", "Pale-carmine", "Pale-cerulean", "Pale-chestnut", "Pale-copper", "Pale-cornflower-blue", "Pale-cyan", "Pale-gold", "Pale-goldenrod", "Pale-green", "Pale-lavender", "Pale-magenta", "Pale-magenta-pink", "Pale-pink", "Pale-plum", "Pale-red-violet", "Pale-robin-egg-blue", "Pale-silver", "Pale-spring-bud", "Pale-taupe", "Pale-turquoise", "Pale-violet", "Pale-violet-red", "Palm-Leaf", "Pansy-purple", "Paolo-Veronese-green", "Papaya-whip", "Paradise-pink", "Paris-Green", "Parrot-Pink", "Pastel-blue", "Pastel-brown", "Pastel-gray", "Pastel-green", "Pastel-magenta", "Pastel-orange", "Pastel-pink", "Pastel-purple", "Pastel-red", "Pastel-violet", "Pastel-yellow", "Patriarch", "Paynes-grey", "Peach", "Peach", "Peach-orange", "Peach-puff", "Peach-yellow", "Pear", "Pearl", "Pearl-Aqua", "Pearly-purple", "Peridot", "Periwinkle", "Permanent-Geranium-Lake", "Persian-blue", "Persian-green", "Persian-indigo", "Persian-orange", "Persian-pink", "Persian-plum", "Persian-red", "Persian-rose", "Persimmon", "Peru", "Pewter-Blue", "Phlox", "Phthalo-blue", "Phthalo-green", "Picton-blue", "Pictorial-carmine", "Piggy-pink", "Pine-green", "Pineapple", "Pink", "Pink-(Pantone)", "Pink-Flamingo", "Pink-lace", "Pink-lavender", "Pink-orange", "Pink-pearl", "Pink-raspberry", "Pink-Sherbet", "Pistachio", "Pixie-Powder", "Platinum", "Plum", "Plum-(web)", "Plump-Purple", "Polished-Pine", "Pomp-and-Power", "Popstar", "Portland-Orange", "Powder-blue", "Princess-Perfume", "Princeton-orange", "Prune", "Prussian-blue", "Psychedelic-purple", "Puce", "Puce-red", "Pullman-Brown-(UPS-Brown)", "Pullman-Green", "Pumpkin", "Purple-(HTML)", "Purple-(Munsell)", "Purple-(X11)", "Purple-Heart", "Purple-mountain-majesty", "Purple-navy", "Purple-pizzazz", "Purple-Plum", "Purple-taupe", "Purpureus", "Quartz", "Queen-blue", "Queen-pink", "Quick-Silver", "Quinacridone-magenta", "Rackley", "Radical-Red", "Raisin-black", "Rajah", "Raspberry", "Raspberry-glace", "Raspberry-pink", "Raspberry-rose", "Raw-Sienna", "Raw-umber", "Razzle-dazzle-rose", "Razzmatazz", "Razzmic-Berry", "Rebecca-Purple", "Red", "Red-(Crayola)", "Red-(Munsell)", "Red-(NCS)", "Red-(Pantone)", "Red-(pigment)", "Red-(RYB)", "Red-brown", "Red-devil", "Red-orange", "Red-purple", "Red-Salsa", "Red-violet", "Redwood", "Regalia", "Registration-black", "Resolution-blue", "Rhythm", "Rich-black", "Rich-black-(FOGRA29)", "Rich-black-(FOGRA39)", "Rich-brilliant-lavender", "Rich-carmine", "Rich-electric-blue", "Rich-lavender", "Rich-lilac", "Rich-maroon", "Rifle-green", "Roast-coffee", "Robin-egg-blue", "Rocket-metallic", "Roman-silver", "Rose", "Rose-bonbon", "Rose-Dust", "Rose-ebony", "Rose-gold", "Rose-madder", "Rose-pink", "Rose-quartz", "Rose-red", "Rose-taupe", "Rose-vale", "Rosewood", "Rosso-corsa", "Rosy-brown", "Royal-azure", "Royal-blue", "Royal-blue", "Royal-fuchsia", "Royal-purple", "Royal-yellow", "Ruber", "Rubine-red", "Ruby", "Ruby-red", "Ruddy", "Ruddy-brown", "Ruddy-pink", "Rufous", "Russet", "Russian-green", "Russian-violet", "Rust", "Rusty-red", "Sacramento-State-green", "Saddle-brown", "Safety-orange", "Safety-orange-(blaze-orange)", "Safety-yellow", "Saffron", "Sage", "St.-Patricks-blue", "Salmon", "Salmon-pink", "Sand", "Sand-dune", "Sandstorm", "Sandy-brown", "Sandy-Tan", "Sandy-taupe", "Sangria", "Sap-green", "Sapphire", "Sapphire-blue", "Sasquatch-Socks", "Satin-sheen-gold", "Scarlet", "Scarlet", "Schauss-pink", "School-bus-yellow", "Screamin-Green", "Sea-blue", "Sea-Foam-Green", "Sea-green", "Sea-Serpent", "Seal-brown", "Seashell", "Selective-yellow", "Sepia", "Shadow", "Shadow-blue", "Shampoo", "Shamrock-green", "Sheen-Green", "Shimmering-Blush", "Shiny-Shamrock", "Shocking-pink", "Shocking-pink-(Crayola)", "Sienna", "Silver", "Silver-chalice", "Silver-Lake-blue", "Silver-pink", "Silver-sand", "Sinopia", "Sizzling-Red", "Sizzling-Sunrise", "Skobeloff", "Sky-blue", "Sky-magenta", "Slate-blue", "Slate-gray", "Smalt-(Dark-powder-blue)", "Slimy-Green", "Smashed-Pumpkin", "Smitten", "Smoke", "Smokey-Topaz", "Smoky-black", "Smoky-Topaz", "Snow", "Soap", "Solid-pink", "Sonic-silver", "Spartan-Crimson", "Space-cadet", "Spanish-bistre", "Spanish-blue", "Spanish-carmine", "Spanish-crimson", "Spanish-gray", "Spanish-green", "Spanish-orange", "Spanish-pink", "Spanish-red", "Spanish-sky-blue", "Spanish-violet", "Spanish-viridian", "Spicy-mix", "Spiro-Disco-Ball", "Spring-bud", "Spring-Frost", "Spring-green", "Star-command-blue", "Steel-blue", "Steel-pink", "Steel-Teal", "Stil-de-grain-yellow", "Stizza", "Stormcloud", "Straw", "Strawberry", "Sugar-Plum", "Sunburnt-Cyclops", "Sunglow", "Sunny", "Sunray", "Sunset", "Sunset-orange", "Super-pink", "Sweet-Brown", "Tan", "Tangelo", "Tangerine", "Tangerine-yellow", "Tango-pink", "Tart-Orange", "Taupe", "Taupe-gray", "Tea-green", "Tea-rose", "Tea-rose", "Teal", "Teal-blue", "Teal-deer", "Teal-green", "Telemagenta", "Tenné-(tawny)", "Terra-cotta", "Thistle", "Thulian-pink", "Tickle-Me-Pink", "Tiffany-Blue", "Tigers-eye", "Timberwolf", "Titanium-yellow", "Tomato", "Toolbox", "Topaz", "Tractor-red", "Trolley-Grey", "Tropical-rain-forest", "Tropical-violet", "True-Blue", "Tufts-Blue", "Tulip", "Tumbleweed", "Turkish-rose", "Turquoise", "Turquoise-blue", "Turquoise-green", "Turquoise-Surf", "Turtle-green", "Tuscan", "Tuscan-brown", "Tuscan-red", "Tuscan-tan", "Tuscany", "Twilight-lavender", "Tyrian-purple", "UA-blue", "UA-red", "Ube", "UCLA-Blue", "UCLA-Gold", "UFO-Green", "Ultramarine", "Ultramarine-blue", "Ultra-pink", "Ultra-red", "Umber", "Unbleached-silk", "United-Nations-blue", "University-of-California-Gold", "Unmellow-yellow", "UP-Forest-green", "UP-Maroon", "Upsdell-red", "Urobilin", "USAFA-blue", "USC-Cardinal", "USC-Gold", "University-of-Tennessee-Orange", "Utah-Crimson", "Van-Dyke-Brown", "Vanilla", "Vanilla-ice", "Vegas-gold", "Venetian-red", "Verdigris", "Vermilion", "Vermilion", "Veronica", "Very-light-azure", "Very-light-blue", "Very-light-malachite-green", "Very-light-tangelo", "Very-pale-orange", "Very-pale-yellow", "Violet", "Violet-(color-wheel)", "Violet-(RYB)", "Violet-(web)", "Violet-blue", "Violet-red", "Viridian", "Viridian-green", "Vista-blue", "Vivid-amber", "Vivid-auburn", "Vivid-burgundy", "Vivid-cerise", "Vivid-cerulean", "Vivid-crimson", "Vivid-gamboge", "Vivid-lime-green", "Vivid-malachite", "Vivid-mulberry", "Vivid-orange", "Vivid-orange-peel", "Vivid-orchid", "Vivid-raspberry", "Vivid-red", "Vivid-red-tangelo", "Vivid-sky-blue", "Vivid-tangelo", "Vivid-tangerine", "Vivid-vermilion", "Vivid-violet", "Vivid-yellow", "Volt", "Wageningen-Green", "Warm-black", "Waterspout", "Weldon-Blue", "Wenge", "Wheat", "White", "White-smoke", "Wild-blue-yonder", "Wild-orchid", "Wild-Strawberry", "Wild-watermelon", "Willpower-orange", "Windsor-tan", "Wine", "Wine-dregs", "Winter-Sky", "Winter-Wizard", "Wintergreen-Dream", "Wisteria", "Wood-brown", "Xanadu", "Yale-Blue", "Yankees-blue", "Yellow", "Yellow-(Crayola)", "Yellow-(Munsell)", "Yellow-(NCS)", "Yellow-(Pantone)", "Yellow-(process)", "Yellow-(RYB)", "Yellow-green", "Yellow-Orange", "Yellow-rose", "Yellow-Sunshine", "Zaffre", "Zinnwaldite-brown", "Zomp");
$materials = array ("Tin-plated steel", "Aluminium");
$countries = array ("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "The Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Myanmar", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "Peoples Republic of China", "Cook Islands", "Colombia", "Comoros", "Democratic Republic of the Congo", "Republic of the Congo", "Costa Rica", "Croatia", "Cuba", "Republic of Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Faroe Islands", "Gabon", "The Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Ivory Coast", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Republic of Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Federated States of Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "North Korea", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "São Tomé and Príncipe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");
$languages = array ("Mandarin (entire branch)", "Spanish", "English", "Hindi", "Arabic", "Portuguese", "Bengali (Bangla)", "Russian", "Japanese", "Punjabi", "German", "Javanese", "Wu (e.g. Shanghainese)", "Malay (inc. Malaysian and Indonesian)", "Telugu", "Vietnamese", "Korean", "French", "Marathi", "Tamil", "Urdu", "Turkish", "Italian", "Yue (incl. Cantonese)", "Thai", "Gujarati", "Jin", "Southern Min (incl. Hokkien and Teochew)", "Persian", "Polish", "Pashto", "Kannada", "Xiang (Hunanese)", "Malayalam", "Sundanese", "Hausa", "Odia (Oriya)", "Burmese", "Hakka", "Ukrainian", "Bhojpuri", "Tagalog (Filipino)", "Yoruba", "Maithili", "Uzbek", "Sindhi", "Amharic", "Fula", "Romanian", "Oromo", "Igbo", "Azerbaijani", "Awadhi", "Gan Chinese", "Cebuano (Visayan)", "Dutch", "Kurdish", "Serbo-Croatian", "Malagasy", "Saraiki", "Nepali", "Sinhalese", "Chittagonian", "Zhuang", "Khmer", "Turkmen", "Assamese", "Madurese", "Somali", "Marwari", "Magahi", "Haryanvi", "Hungarian", "Chhattisgarhi", "Greek", "Chewa", "Deccan", "Akan", "Kazakh", "Northern Min", "Sylheti", "Zulu", "Czech", "Kinyarwanda", "Dhundhari", "Haitian Creole", "Eastern Min (inc. Fuzhounese)", "Ilocano", "Quechua", "Kirundi", "Swedish", "Hmong", "Shona", "Uyghur", "Hiligaynon/Ilonggo (Visayan)", "Mossi", "Xhosa", "Belarusian", "Balochi", "Konkani");
$streets = array ("Second street", "Third street", "First street", "Fourth street", "Park street", "Fifth street", "Main street", "Sixth street", "Oak street", "Seventh street", "Pine street", "Maple street", "Cedar street", "Eighth street", "Elm street", "View street", "Washington street", "Ninth street", "Lake street", "Hill street", "High Street", "Station Road", "Main Street", "Park Road", "Church Road", "Church Street", "London Road", "Victoria Road", "Green Lane", "Manor Road", "Church Lane", "Park Avenue", "The Avenue", "The Crescent", "Queens Road", "New Road", "Grange Road", "Kings Road", "Kingsway", "Windsor Road", "Highfield Road", "Mill Lane", "Alexander Road", "York Road", "St. John’s Road", "Main Road", "Broadway", "King Street", "The Green", "Springfield Road", "George Street", "Park Lane", "Victoria Street", "Albert Road", "Queensway", "New Street", "Queen Street", "West Street", "North Street", "Manchester Road", "The Grove", "Richmond Road", "Grove Road", "South Street", "School Lane", "The Drive", "North Road", "Stanley Road", "Chester Road", "Mill Road");
$drinks = array ("classic", "sugarfree", "blueberry", "strawberry", "winter", "yellow", "lime", "white", "blue", "green", "zero calories");
$machine_types = array ("luxury", "standard", "business");
$OSs = array ("Win7", "Win10", "IOS", "Ubuntu", "Android");
$CPUs = array ("Core i5", "Celeron", "Core i6", "Core i7", "Core i8", "Core i9");
$all_graphics = array ("Intel UHD Graphics 610", "Intel HD 4600, DirectX 12, Displayport, DVI, VGA", "Intel UHD Grafik 630", "Intel HD Graphics, DirectX® 11, VGA, HDMI");
$prog_langs = array ("Java", "C++", "C#", "VB.NET", "C");
$protection_type = array ("Scratch-resistant glass", "oleophobic coating", "Corning Gorilla Glass");
$display_type = array ("LED-backlit IPS LCD", "Super AMOLED capacitive touchscreen", "AMOLED capacitive touchscreen", "IPS LCD");
$resolution_type = array (480, 720, 1080, 1440, 2160);

//DROP all tables (happens before creating new ones - drops them if there are any to avoid errors)
echo "Dropping tables...", PHP_EOL;

	$query = "
	DROP TABLE public.\"display\" CASCADE;
	DROP TABLE public.\"information\" CASCADE;
	DROP TABLE public.\"button\" CASCADE;
	DROP TABLE public.\"bottle\" CASCADE;
	DROP TABLE public.\"application\" CASCADE;
	DROP TABLE public.\"machine\" CASCADE;
	DROP TABLE public.\"computer\" CASCADE; ";
	$result = pg_query($query);

//CREATE TABLES
echo "Creating tables...", PHP_EOL;

	$query = "
CREATE TABLE public.\"computer\"
(
  serial_number integer NOT NULL,
  os character varying(50),
  cpu character varying(50),
  graphics character varying(50),
  memory int,
  hard_disk_size int,
  CONSTRAINT computer_pkey PRIMARY KEY (serial_number)
);";
	$result = pg_query($query);
		$query = "
CREATE TABLE public.\"machine\"
(
  serial_number integer NOT NULL,
  type character varying(50),
  address xml,
  height int,
  length int,
  width int,
  CONSTRAINT machine_pkey PRIMARY KEY (serial_number)
);";
	$result = pg_query($query);
	$query = "
CREATE TABLE public.\"application\"
(
  id integer NOT NULL,
  version numeric,
  programming_lang character varying(50),
  dev_info xml,
  published date,
  fk_serial_number int,
  CONSTRAINT application_pkey PRIMARY KEY (id),
  CONSTRAINT \"application_FK_serial_number_fkey\" FOREIGN KEY (\"fk_serial_number\")
      REFERENCES public.\"computer\" (serial_number) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);";
	$result = pg_query($query);
	$query = "
	CREATE TABLE public.\"bottle\"
(
  id integer NOT NULL,
  material character varying(50),
  height numeric,
  diameter numeric,
  content character varying(50),
  fk_serial_number int,
  CONSTRAINT bottle_pkey PRIMARY KEY (id),
  CONSTRAINT \"bottle_FK_serial_number_fkey\" FOREIGN KEY (\"fk_serial_number\")
      REFERENCES public.\"machine\" (serial_number) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);";
	$result = pg_query($query);
	$query = "
	CREATE TABLE public.\"information\"
(
  id integer NOT NULL,
  created date,
  gears_condition int,
  paint_condition int,
  cables_condition int,
  fk_serial_number int,
  CONSTRAINT information_pkey PRIMARY KEY (id),
  CONSTRAINT \"information_FK_serial_number_fkey\" FOREIGN KEY (\"fk_serial_number\")
      REFERENCES public.\"machine\" (serial_number) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);";
	$result = pg_query($query);
	$query = "
CREATE TABLE public.\"display\"
(
  id integer NOT NULL,
  type character varying(50),
  diameter numeric,
  resolution int,
  protection character varying(50),
  fk_serial_number int,
  CONSTRAINT display_pkey PRIMARY KEY (id),
  CONSTRAINT \"display_FK_serial_number_fkey\" FOREIGN KEY (\"fk_serial_number\")
      REFERENCES public.\"computer\" (serial_number) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);";
	$result = pg_query($query);
	$query = "
CREATE TABLE public.\"button\"
(
  id integer NOT NULL,
  color character varying(50),
  diameter numeric,
  weight int,
  isTouchscreenBtn boolean,
  fk_serial_number int,
  CONSTRAINT button_pkey PRIMARY KEY (id),
  CONSTRAINT \"button_FK_serial_number_fkey\" FOREIGN KEY (\"fk_serial_number\")
      REFERENCES public.\"computer\" (serial_number) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);";
	$result = pg_query($query);
	
	
// INSERT VALUES
echo "Inserting values...", PHP_EOL;

//Computer:
for ($x = 0; $x <= $entriesNumber; $x++) {
	
	$serial_number = 4000 + $x;
	$OS = $OSs[rand(0,count($OSs)-1)];
	$CPU = $CPUs[rand(0,count($CPUs)-1)];
	$graphics = $all_graphics[rand(0,count($all_graphics)-1)];
	$memory =  pow(2,rand(1,5));
	$hard_disk_size = rand(200,1129);
	
	$query = "INSERT INTO public.\"computer\"(
            serial_number, os, cpu, graphics, memory, 
            hard_disk_size)
    VALUES ('" . $serial_number."', '".$OS."', '".$CPU."', '".$graphics."', '".$memory."', '".$hard_disk_size . "');";
	$result = pg_query($query);
}

//Machine:
for ($x = 0; $x <= $entriesNumber; $x++) {
	$serial_number = 2000 + $x;
	$type = $machine_types[rand(0,count($machine_types)-1)];
	$country = $countries[rand(0,count($countries)-1)];
	$address = $address = "<address><!-- level 1--><owner_name><given_name>" . $firstNames[rand(0,count($firstNames)-1)] . "</given_name><family_name>" . $lastNames[rand(0,count($lastNames)-1)] . "</family_name></owner_name><address zip=\"" . rand(1000,9999) . "\" country=\"" . $country  . "\"><street><!-- level 3--><name>" . $streets[rand(0,count($streets)-1)] . "</name><!-- level 4--><number>" . rand(1,120) . "</number></street><city>" . $country . " City</city></address></address>";
	$height = rand(120,221);
	$length =  rand(70,140);
	$width = rand(60,110);
	
	$query = "INSERT INTO public.\"machine\"(
            serial_number, type, address, height, length, 
            width)
    VALUES ('" . $serial_number."', '".$type."', '".$address."', '".$height."', '".$length."', '".$width . "');";
	$result = pg_query($query);
}

//Application:
for ($x = 0; $x <= $entriesNumber; $x++) {

	$id = 3000 + $x;
	$FK_serial_number = 4000 + $x;
	$version = rand(10, 30)/10;
	$programming_lang = $prog_langs[rand(0,count($prog_langs)-1)];
	
	$number_of_devs = rand(3, 20);
	$dev_str = "";
	for ($y = 0; $y < $number_of_devs; $y++) {
		$street_name = $streets[rand(0,count($streets)-1)];
		$street_number = rand(1, 150);
	
		$dev_str .= "<dev street=\"" . $street_name . "\" street_number=\"" . $street_number . "\">";
		if($y == 0)
			$dev_str .= "<!-- level 3-->";
		$tempFirstName = $firstNames[rand(0,count($firstNames)-1)];
		$tempSecondName = $lastNames[rand(0,count($lastNames)-1)];
		$dev_str .= "<first_name>" . $tempFirstName . "</first_name>";
		if($y == 0)
			$dev_str .= "<!-- level 4-->";
		$dev_str .= "<second_name>" . $tempSecondName . "</second_name></dev>";
	}
	$country = $countries[rand(0,count($countries)-1)];
	$dev_info = "<team><!-- level 1--><name><!-- level 2--></name><devs country=\"" . $country . "\"><number_of_devs>" . $number_of_devs . "</number_of_devs>" . $dev_str . "</devs></team>";
	
	$inttemptime=mt_rand(946681200, time(true));
	$published = date("Y-m-d",$inttemptime);

	$query = "INSERT INTO public.\"application\"(
            id, \"fk_serial_number\", version, programming_lang, dev_info, published)
    VALUES ('" . $id . "', '" . $FK_serial_number . "', '" . $version . "', '" . $programming_lang . "', '" . $dev_info . "', '" . $published . "');";
	$result = pg_query($query);
}

//Bottle:
for ($x = 0; $x <= $entriesNumber; $x++) {
	
	$id = 1000 + $x;
	$material = $materials[rand(0,count($materials)-1)];
	$height = rand(10, 15)/10;
	$diameter = rand(3, 5)/10;
	$content = $drinks[rand(0,count($drinks)-1)];
	$FK_serial_number = 2000 + $x;
	
	$query = "INSERT INTO public.bottle(
            id, material, height, diameter, content, fk_serial_number)
     VALUES ('" . $id . "', '" . $material . "', '" . $height . "', '" . $diameter . "', '" . $content . "', '" . $FK_serial_number . "');";
	$result = pg_query($query);
}

//Information:
for ($x = 0; $x <= $entriesNumber; $x++) {
	
	$id = 5000 + $x;
	
	$inttemptime=mt_rand(946681200, time(true));
	$created = date("Y-m-d",$inttemptime);
	
	$gears_condition = rand(1, 101);
	$paint_condition = rand(1, 101);;
	$cables_condition = rand(1, 101);
	$FK_serial_number = 2000 + $x;
	
	$query = "INSERT INTO public.information(
            id, created, gears_condition, paint_condition, cables_condition, fk_serial_number)
     VALUES ('" . $id . "', '" . $created . "', '" . $gears_condition . "', '" . $paint_condition . "', '" . $cables_condition . "', '" . $FK_serial_number . "');";
	$result = pg_query($query);
}

//Display:
for ($x = 0; $x <= $entriesNumber; $x++) {
	
	$id = 1000 + $x;
	$type = $display_type[rand(0,count($display_type)-1)];
	$diameter = rand(60, 130)/10;
	$resolution = $resolution_type[rand(0,count($resolution_type)-1)];
	$protection = $protection_type[rand(0,count($protection_type)-1)];
	$FK_serial_number = 4000 + $x;
	
	$query = "INSERT INTO public.display(
            id, type, diameter, resolution, protection, fk_serial_number)
     VALUES ('" . $id . "', '" . $type . "', '" . $diameter . "', '" . $resolution . "', '" . $protection . "', '" . $FK_serial_number . "');";
	$result = pg_query($query);
}

//Button:
for ($x = 0; $x <= $entriesNumber; $x++) {
	
	$id = 1000 + $x;
	$color = $colours[rand(0,count($colours)-1)];
	$diameter = rand(10, 30)/10;
	$weight = rand(1, 4);
	$FK_serial_number = 4000 + $x;
	
	$isTouchscreenBtn = 0;
	if(rand(0,1) < 0.5)
		$isTouchscreenBtn = 1;
	
	$query = "INSERT INTO public.button(
            id, color, diameter, weight, isTouchscreenBtn, fk_serial_number)
     VALUES ('" . $id . "', '" . $color . "', '" . $diameter . "', '" . $weight . "', '" . $isTouchscreenBtn . "', '" . $FK_serial_number . "');";
	$result = pg_query($query);
}

echo "... finished!", PHP_EOL;

?>
