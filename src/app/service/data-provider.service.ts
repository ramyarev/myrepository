import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class DataProviderService {

  constructor() { }

    religions = [
    "Hindu",
    "Christian",
    "Muslim-Shia",
    "Muslim-Sunni",
    "Muslim-Others",
    "Jain-Digambar",
    "Jain-Shwetambar",
    "Jain-Others",
    "Parsi",
    "Buddhist",
    "Sikh",
    "Jewish",
    "Inter - Religion"
  ];

  lookingFor = [
    "Bride",
    "Groom"
  ]

    feets = [
      4,5,6,7
    ];

    inches = [
      1,2,3,4,5,6,7,8,9,10,11,12
    ];

    kgs = [
      41,42,43,44,45,46,47,48,49,50,
      51,52,53,54,55,56,57,58,59,60,
      61,62,63,64,65,66,67,68,69,70,
      71,72,73,74,75,76,77,78,79,80,
      81,82,83,84,85,86,87,88,89,90,
      91,92,93,94,95,96,97,98,99,100,
    ];

    gms = [
      41,42,43,44,55,56,57,58,59,60,
      51,52,53,54,55,56,57,58,59,60,
      61,62,63,64,65,66,67,68,69,70,
      71,72,73,74,75,76,77,78,79,80,
      81,82,83,84,85,86,87,88,89,90,
      91,92,93,94,95,96,97,98,99,100,
    ];

    countries=[
      "Indian",
      "Sri Lankan",
      "Russian",
      "American",
      "Pakistanian",
      "British",
      "Irish",
      "Brazilian",
      "Italian",
      "Chinese",
      "Polish",
      "Austrian",
      "Canadian",
      "Malaysian",
      "South Korean",
      "North Korean",
      "German",
      "Swedish",
      "French",
      "Swiss",
      "Others",
    ];

    degress=[
      "B.ARCH",
      "BCA",
      "BE",
      "B.PLAN",
      "B.sc IT/Computer science",
      "B.TECH",
      "M.ARCH",
      "MCA",
      "ME",
      "M.sc IT/ Computer science",
      "M.S (ENGG)",
      "M.TECH",
      "PGDCA",
      "B.A",
      "B.Com",
      "B.Ed",
      "BFA",
      "BFT",
      "BLIS",
      "BMM",
      "B.Sc",
      "B.S.W",
      "BLIS",
      "B.M.M",
      "B.Sc",
      "B.S.W",
      "B.PHIL",
      "M.A",
      "M.Com",
      "M.Ed",
      "MFA",
      "MLIS",
      "M.Sc",
      "MSW",
      "M.Phil",
      "BBA",
      "BFM",
      "BHM",
      "MBA",
      "MFM",
      "MHM",
      "MHRM",
      "PGDM",
      "B.A.M.S",
      "BDS",
      "BHMS",
      "BSMS",
      "B.PHARM",
      "BPT",
      "BUMS",
      "BVSC",
      "MBBS",
      "B.SC (Nursing)",
      "MDS",
      "MD/MS (MEDICAL)",
      "M.Pharm",
      "MPT",
      "MVSC",
      "BGL",
      "B.L",
      "LLB",
      "L.L.M",
      "M.L",
      "CA",
      "CFA",
      "CS",
      "ICWA",
      "IAS",
      "IES",
      "IFS",
      "IRS",
      "IPS",
      "Ph.d",
      "Diploma",
      "Polytechnic",
      "Trade school",
      "Higher secondary school/High school",
      "Others"
  ];

    jobs = [
      "Admin",
      "Supervisor",
      "Manager",
      "Officer",
      "Administrative Professional",
      "Executive",
      "Clerk",
      "Human Resources pProfessional",
      "Agriculture",
      "Agriculture and farming professional",
      "Airline",
      "Pilot",
      "Air Hostess",
      "Airline Professionals",
      "Architech and Design",
      "Architect",
      "Interior Designer",
      "Banking and finance",
      "Chartered accountant",
      "Company Secretary",
      "Accounts/financial professional",
      "Banking service professional",
      "Auditor",
      "Financial analyst /planning",
      "Beauty and Fashion",
      "Fashion Designer",
      "Beautician",
      "Civil service(IAS/IPS/IRS/IES/IFS)",
      "Defense",
      "Army",
      "Navy",
      "Air Force",
      "Education",
      "Professor/Lecturer",
      "Education professional",
      "Hospitality",
      "Hotel/Hospitality Professional",
      "IT and Engineering",
      "Software professional",
      "Hardware professional",
      "Engineer Non IT",
      "Designer",
      "Legal",
      "Lawyer and Legal Professional",
      "Medical",
      "Doctor",
      "Health care professional",
      "Paramedical professional",
      "Nurse",
      "Marketing professional",
      "Sales professional",
      "Journalist",
      "Media professional",
      "Entertainment professional",
      "Event management professional",
      "Advertising/PR professional",
      "Mariner/merchant navy",
      "Scientist",
      "Scientist Research",
      "CXO\\President,Director,Chairman",
      "Business Analyst",
      "Consultant",
      "Customer care professional",
      "Social worker",
      "Sportsman",
      "Technician",
      "Arts and Craftsman",
      "Librarian",
      "Business  Owner/Entrepreneur.",
      "Others"
  ];

    castes  = [
      "24 Manai Telugu Chettiar",
      "Aaru Nattu Vellala",
      "Achirapakkam Chettiar",
      "Adi Dravidar",
      "Agamudayar/Arcot/Thuluva Vellala",
      "Agaran Vellan Chettiar",
      "Ahirwar",
      "Arunthathiyar",
      "Ayira Vysya",
      "Badaga",
      "Bairwa",
      "Balai",
      "Beri Chettiar",
      "Boyar",
      "Brahmin - Anaviln Desai",
      "Brahmin - Baidhiki/Vaidhiki",
      "Brahmin - Bardai",
      "Brahmin - Bhargav",
      "Brahmin - Gurukkal",
      "Brahmin - Iyengar",
      "Brahmin - Iyer",
      "Brahmin - Khadayata",
      "Brahmin - Khedaval",
      "Brahmin - Mevada",
      "Brahmin - Rajgor",
      "Brahmin - Rarhi/Radhi",
      "Brahmin - Sarua",
      "Brahmin - Shri Gaud",
      "Brahmin - Tapodhan",
      "Brahmin - Valam",
      "Brahmin - Zalora",
      "Brahmin - Sri Vaishnava",
      "Brahmin - Cherakula Vellalar",
      "Brahmin - Chettiar",
      "Brahmin - Desikar",
      "Brahmin - Desikar Tanjavur",
      "Brahmin - Devandra Kula Vellalar",
      "Brahmin - Devanga Chettiar",
      "Brahmin - Devar/Thevar/Mukkulathor",
      "Brahmin - Dhanak",
      "Elur Chetty",
      "Gandla/Ganiga",
      "Gounder",
      "Gounder - Kongu - Vellala Gounder",
      "Gounder - Nattu Gounder",
      "Gounder - Others",
      "Gounder - Uralii Gounder",
      "Gounder - Vanniya Kula Kshatriyar",
      "Gounder - Vettuva Gounder",
      "Gramani",
      "Gurukkal Brahmin",
      "Illaththu Pillai",
      "Intercaste",
      "Isai Vellalar",
      "Iyenga Brahmin",
      "Iyer Brahmin",
      "Julaha",
      "Kamma Naidu",
      "Kanaka Padanna",
      "Kandara",
      "Karkathar",
      "Karuneegar",
      "Kasukara",
      "Kerala Mudali",
      "Khatik",
      "Kodikal Pillai",
      "Kongu Chettiar",
      "Kongu Nadar",
      "Kongu Vellala Gounder",
      "Kori/Koli",
      "Krishnavaka",
      "Kshatriya Raju",
      "Kulalar",
      "Kuravan",
      "Kuruhini Chetty",
      "Kurumbar",
      "Kuruva",
      "Manja Pudhu Chettiar",
      "Mannan/Velan/Vannan",
      "Maruthuvar",
      "Meenavar",
      "Meghwal",
      "Mudaliyar",
      "Mukkulathor",
      "Muthuraja",
      "Nadar",
      "Naicker",
      "Naicker - Others",
      "Naicker - Vanniya Kula",
      "Naicker - Kshatriyar",
      "Naidu",
      "Nanjil Mudali",
      "Nanjil Nattu Vellalar",
      "Nanjil Vellalar",
      "Nanjil Pillai",
      "Nankudi Vellalar",
      "Nattu Gounder",
      "Nattukudi Chettiar",
      "Othuvaar",
      "Padanashali",
      "Pallan/Devandrakula Vellalar",
      "Panan",
      "Pandaram",
      "Pandiya Vellalar",
      "Pannirandam Chettiar",
      "Paravan/Bharatar",
      "Parkavakulam/Udayar",
      "Parkavakulam/Udayar",
      "Pattinavar",
      "Pattusali",
      "Pillai",
      "Poundra",
      "Pulaya/Cheruman",
      "Reddy",
      "Rohit/Chamar",
      "SC",
      "ST",
      "Sadhu Chetty",
      "Saiva Pillai Thanjavar",
      "Saiva Pillai Tirunelveli",
      "Saiva Velllan Chettiar",
      "Samagar",
      "Sambava",
      "Satnami",
      "Senai Thalaivar",
      "Senguntha Mudaliyar",
      "Sengunthar/Kaikolar",
      "Shilpkar",
      "Sonkar",
      "Sourashtra",
      "Sozhia Chetty",
      "Sozhia Vellalar",
      "Telugupatti",
      "Thandan",
      "Thondai Mandala Vellalar",
      "Urali Gounder",
      "Vadambar",
      "Vadugan",
      "Vaniya Chettiar",
      "Vannar",
      "Vannia Kula Kshatriyar",
      "Veera Saivm",
      "Veerakodi Vellalar",
      "Vellalar",
      "Vellan Chettiars",
      "Vettuva Gounder",
      "Vishwakarma",
      "Vokkaliga",
      "Yadav",
      "Yadava Naidu",
      "Christan -Anglo - Indian",
      "Christan -Born Again",
      "Christan -Born Again",
      "Christan -Church Of South India",
      "Christan -Evangelist",
      "Christan -Jacobite",
      "Christan -Latin Catholic",
      "Christan -Malankara Catholic",
      "Christan -Pentecost",
      "Christan -Roman - Catholic",
      "Christan -Seventh - day - Adventist",
      "Christan -Syiran Catholic",
      "Christan -Syiran Jacobite",
      "Christan -Syro Malabar",
      "Christan -Christan - Others",
      "Muslim - Ansari",
      "Muslim - Arain",
      "Muslim - Awan",
      "Muslim - Bohra",
      "Muslim - Dekkani",
      "Muslim - Dudekula",
      "Muslim - Hanafi",
      "Muslim - Jat",
      "Muslim - Khoja",
      "Muslim - Lebbai",
      "Muslim - Malik",
      "Muslim - Mapila",
      "Muslim - Maraicar",
      "Muslim - Memon",
      "Muslim - Mughal",
      "Muslim - Pathan",
      "Muslim - Qureshi",
      "Muslim - Mapila",
      "Don't Wish to Specify",
      "Others"
  ];

  family_types = [
    "Joint",
    "Individual",
    "Seperated",
    "Others"
  ];

  family_statuses = [
    "Poor",
    "Middle Class",
    "Upper Middle Class",
    "Rich ",
    "Very Rich"
  ];

  profileCreatedBy=[
      "Myself",
      "Son",
      "Daughter",
      "Brother",
      "Sister",
      "Relative",
      "Friend",
      "Others"
  ];

  raasis = [
    "Aries",
    "Taurus",
    "Gemini",
    "Cancer",
    "Leo",
    "Virgo",
    "Libra",
    "Scorpio",
    "Sagittarius",
    "Capricorn",
    "Aquarius",
    "Pisces",
    "Others"
  ];

  stars=[];

  doshams=[];

  bodyTypes = [ 
    "Slim",
    "Fat",
    "Normal",
    "Don't wish to specify"
  ];

  physicalStatuses = [ 
    "Normal",
    "Physically Challenged",
    "Others",
    "Don't wish to Specify"
  ];

  complexions = [
    "Fair",
    "Very Fair",
    "Wheatish",
    "Dusky",
    "Others",
    "Don't wish to specify"
  ];

  maritalStatuses = [
    "Select a Marital Status",
    "Unmarried",
    "Married",
    "Divorced",
    "Widowed",
    "Others"
  ];

  codes = [                            
    { code:"100",name:"India(+91)" },
                  
    { code:"221",name:"United Kingdom(+44)" },

    { code:"222",name:"United States(+1)" },

    { code:"1",name:"Afghanistan(+93)" },

    { code:"2",name:"Albania(+355)" },

    { code:"3",name:"Algeria(+213)" },

    { code:"4",name:"American Samoa(+684)" },

    { code:"5",name:"Andorra(+376)" },

    { code:"6",name:"Angola(+244)" },

    { code:"7",name:"Anguilla(+1)" },

    { code:"8",name:"Antarctica(+672)" },

    { code:"9",name:"Antigua and Barbuda(+1)" },

    { code:"10",name:"Argentina(+54)" },

    { code:"11",name:"Armenia(+374)" },

    { code:"12",name:"Aruba(+297)" },

    { code:"13",name:"Australia(+61)" },

    { code:"14",name:"Austria(+43)" },

    { code:"15",name:"Azerbaidjan(+994)" },

    { code:"16",name:"Bahamas(+1)" },

    { code:"17",name:"Bahrain(+973)" },

    { code:"18",name:"Bangladesh(+880)" },

    { code:"19",name:"Barbados(+1)" },

    { code:"20",name:"Belarus(+375)" },

    { code:"21",name:"Belgium(+32)" },

    { code:"22",name:"Belize(+501)" },

    { code:"23",name:"Benin(+229)" },

    { code:"24",name:"Bermuda(+1)" },

    { code:"35",name:"Bhutan(+975)" },

    { code:"25",name:"Bolivia(+591)" },

    { code:"26",name:"Bosnia-Herzegovina(+387)" },

    { code:"27",name:"Botswana(+267)" },

    { code:"28",name:"Bouvet Island(+47)" },

    { code:"29",name:"Brazil(+55)" },

    { code:"30",name:"British Indian O. Terr.(+246)" },

    { code:"31",name:"Brunei Darussalam(+673)" },

    { code:"32",name:"Bulgaria(+359)" },

    { code:"33",name:"Burkina Faso(+226)" },

    { code:"34",name:"Burundi(+257)" },

    { code:"36",name:"Cambodia(+855)" },

    { code:"37",name:"Cameroon(+237)" },

    { code:"38",name:"Canada(+1)" },

    { code:"39",name:"Cape Verde(+238)" },

    { code:"40",name:"Cayman Islands(+1)" },

    { code:"41",name:"Central African Rep.(+236)" },

    { code:"42",name:"Chad(+235)" },

    { code:"43",name:"Chile(+56)" },

    { code:"44",name:"China(+86)" },

    { code:"47",name:"Colombia(+57)" },

    { code:"48",name:"Comoros(+269)" },

    { code:"49",name:"Congo(+242)" },

    { code:"50",name:"Cook Islands(+682)" },

    { code:"51",name:"Costa Rica(+506)" },

    { code:"53",name:"Croatia(+385)" },

    { code:"54",name:"Cuba(+53)" },

    { code:"55",name:"Cyprus(+357)" },

    { code:"56",name:"Czech Republic(+420)" },

    { code:"57",name:"Czechoslovakia()" },

    { code:"58",name:"Denmark(+45)" },

    { code:"59",name:"Djibouti(+253)" },

    { code:"60",name:"Dominica(+1)" },

    { code:"62",name:"Dominican Republic(+1)" },

    { code:"63",name:"East Timor(+670)" },

    { code:"64",name:"Ecuador(+593)" },

    { code:"65",name:"Egypt(+20)" },

    { code:"66",name:"El Salvador(+503)" },

    { code:"67",name:"Equatorial Guinea(+240)" },

    { code:"68",name:"Estonia(+372)" },

    { code:"69",name:"Ethiopia(+251)" },

    { code:"70",name:"Falkland Isl.(Malvinas)(+500)" },

    { code:"71",name:"Faroe Islands(+298)" },

    { code:"72",name:"Fiji(+679)" },

    { code:"73",name:"Finland(+358)" },

    { code:"74",name:"France(+33)" },

    { code:"75",name:"France (European Ter.),()" },

    { code:"76",name:"French Southern Terr.()" },

    { code:"77",name:"Gabon(+241)" },

    { code:"78",name:"Gambia(+220)" },

    { code:"79",name:"Georgia(+995)" },

    { code:"80",name:"Germany(+49)" },

    { code:"81",name:"Ghana(+233)" },

    { code:"82",name:"Gibraltar(+350)" },

    { code:"84",name:"Greece(+30)" },

    { code:"85",name:"Greenland(+299)" },

    { code:"86",name:"Grenada(+1)" },

    { code:"87",name:"Guadeloupe (Fr.)(+590)" },

    { code:"88",name:"Guam (US)(+1)" },

    { code:"89",name:"Guatemala(+502)" },

    { code:"90",name:"Guinea(+224)" },

    { code:"91",name:"Guinea Bissau(+245)" },

    { code:"92",name:"Guyana(+592)" },

    { code:"93",name:"Guyana (Fr.)()" },

    { code:"94",name:"Haiti(+509)" },

    { code:"95",name:"Heard &amp; McDonald Isl.()" },

    { code:"96",name:"Honduras(+504)" },

    { code:"97",name:"Hong Kong(+852)" },

    { code:"98",name:"Hungary(+36)" },

    { code:"99",name:"Iceland(+354)" },

    { code:"101",name:"Indonesia(+62)" },

    { code:"102",name:"Iran(+98)" },

    { code:"103",name:"Iraq(+964)" },

    { code:"104",name:"Ireland(+353)" },

    { code:"105",name:"Israel(+972)" },

    { code:"232",name:"Italy(+39)" },

    { code:"106",name:"Ivory Coast(+225)" },

    { code:"107",name:"Jamaica(+1)" },

    { code:"108",name:"Japan(+81)" },

    { code:"109",name:"Jordan(+962)" },

    { code:"110",name:"Kazakhstan(+7)" },

    { code:"111",name:"Kenya(+254)" },

    { code:"113",name:"Kiribati(+686)" },

    { code:"114",name:"Korea (North)(+850 )" },

    { code:"115",name:"Korea (South)(+82)" },

    { code:"116",name:"Kuwait(+965)" },

    { code:"112",name:"kyrgyzstan(+996)" },

    { code:"117",name:"Laos(+856)" },

    { code:"118",name:"Latvia(+371)" },

    { code:"119",name:"Lebanon(+961)" },

    { code:"120",name:"Lesotho(+266)" },

    { code:"121",name:"Liberia(+231)" },

    { code:"122",name:"Libya(+218)" },

    { code:"123",name:"Liechtenstein(+423)" },

    { code:"124",name:"Lithuania(+370)" },

    { code:"125",name:"Luxembourg(+352)" },

    { code:"126",name:"Macau(+853)" },

    { code:"127",name:"Madagascar(+261)" },

    { code:"128",name:"Malawi(+265)" },

    { code:"129",name:"Malaysia(+60)" },

    { code:"130",name:"Maldives(+960)" },

    { code:"131",name:"Mali(+223)" },

    { code:"132",name:"Malta(+356)" },

    { code:"133",name:"Marshall Islands(+692 )" },

    { code:"134",name:"Martinique (Fr.)(+596)" },

    { code:"135",name:"Mauritania(+222)" },

    { code:"136",name:"Mauritius(+230)" },

    { code:"137",name:"Mexico(+52)" },

    { code:"138",name:"Micronesia(+691)" },

    { code:"139",name:"Moldova(+373)" },

    { code:"140",name:"Monaco(+377)" },

    { code:"141",name:"Mongolia(+976)" },

    { code:"142",name:"Montserrat(+1)" },

    { code:"143",name:"Morocco(+212)" },

    { code:"144",name:"Mozambique(+258)" },

    { code:"145",name:"Myanmar(+95)" },

    { code:"146",name:"Namibia(+264)" },

    { code:"147",name:"Nauru(+674)" },

    { code:"148",name:"Nepal(+977)" },

    { code:"150",name:"Netherland Antilles(+599)" },

    { code:"151",name:"Netherlands(+31)" },

    { code:"152",name:"Neutral Zone()" },

    { code:"153",name:"New Caledonia (Fr.)(+687)" },

    { code:"154",name:"New Zealand(+64)" },

    { code:"155",name:"Nicaragua(+505)" },

    { code:"156",name:"Niger(+227)" },

    { code:"157",name:"Nigeria(+234)" },

    { code:"158",name:"Niue(+683)" },

    { code:"159",name:"Norfolk Island(+672)" },

    { code:"160",name:"Northern Mariana Isl.(+1)" },

    { code:"161",name:"Norway(+47)" },

    { code:"162",name:"Oman(+968)" },

    { code:"163",name:"Pakistan(+92)" },

    { code:"164",name:"Palau(+680)" },

    { code:"165",name:"Panama(+507)" },

    { code:"166",name:"Papua New Guinea(+675)" },

    { code:"167",name:"Paraguay(+595)" },

    { code:"168",name:"Peru(+51)" },

    { code:"169",name:"Philippines(+63)" },

    { code:"170",name:"Pitcairn Islands(+672)" },

    { code:"171",name:"Poland(+48)" },

    { code:"172",name:"Polynesia (Fr.)(+689)" },

    { code:"173",name:"Portugal(+351)" },

    { code:"174",name:"Qatar(+974)" },

    { code:"175",name:"Reunion (Fr.)(+262)" },

    { code:"176",name:"Romania(+40)" },

    { code:"177",name:"Russian Federation(+7)" },

    { code:"178",name:"Rwanda(+250)" },

    { code:"179",name:"Saint Lucia(+1)" },

    { code:"180",name:"Samoa(+685)" },

    { code:"181",name:"San Marino(+378)" },

    { code:"182",name:"Saudi Arabia(+966)" },

    { code:"183",name:"Senegal(+221)" },

    { code:"184",name:"Seychelles(+248)" },

    { code:"185",name:"Sierra Leone(+232)" },

    { code:"186",name:"Singapore(+65)" },

    { code:"187",name:"Slovakia(+421)" },

    { code:"188",name:"Slovenia(+386)" },

    { code:"189",name:"Solomon Islands(+677)" },

    { code:"190",name:"Somalia(+252)" },

    { code:"191",name:"South Africa(+27)" },

    { code:"192",name:"Spain(+34)" },

    { code:"193",name:"St. Helena(+290)" },

    { code:"194",name:"St. Pierre &amp; Miquelon(+508)" },

    { code:"195",name:"St. Tome and Principe(+239)" },

    { code:"196",name:"St.Kitts Nevis Anguilla(+1)" },

    { code:"197",name:"St.Vincent &amp; Grenadines(+1)" },

    { code:"198",name:"Sudan(+249)" },

    { code:"199",name:"Suriname(+597)" },

    { code:"200",name:"Svalbard(+508)" },

    { code:"201",name:"Swaziland(+268)" },

    { code:"202",name:"Sweden(+46)" },

    { code:"203",name:"Switzerland(+41)" },

    { code:"204",name:"Syria(+963)" },

    { code:"205",name:"Tadjikistan(+992)" },

    { code:"206",name:"Taiwan(+886)" },

    { code:"207",name:"Tanzania(+255)" },

    { code:"208",name:"Thailand(+66)" },

    { code:"209",name:"Togo(+228)" },

    { code:"210",name:"Tokelau(+690)" },

    { code:"211",name:"Tonga(+676)" },

    { code:"212",name:"Trinidad &amp; Tobago(+1)" },

    { code:"213",name:"Tunisia(+216)" },

    { code:"214",name:"Turkey(+90)" },

    { code:"215",name:"Turkmenistan(+993)" },

    { code:"216",name:"Turks &amp; Caicos Islands(+1)" },

    { code:"217",name:"Tuvalu(+688)" },

    { code:"218",name:"Uganda(+256)" },

    { code:"219",name:"Ukraine(+380)" },

    { code:"220",name:"United Arab Emirates(+971)" },

    { code:"223",name:"Uruguay(+598)" },

    { code:"224",name:"US Minor outlying Isl.()" },

    { code:"225",name:"Uzbekistan(+998)" },

    { code:"226",name:"Vanuatu(+678)" },

    { code:"227",name:"Vatican City State(+39)" },

    { code:"228",name:"Venezuela(+58)" },

    { code:"229",name:"Vietnam(+84)" },

    { code:"230",name:"Virgin Islands (British)(+1 )" },

    { code:"231",name:"Zimbabwe(+263)" }
];

}
