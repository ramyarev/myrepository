<?php 
require('../config.php');
$userid= $_REQUEST['id'];

$getdata=mysqli_query($conn,"select * from tbl_user where user_id='".$userid."'");
$fetchdata=mysqli_fetch_array($getdata);



?>
<table style="border:0px;background-color:#FFFFFF;" align="center">
	<tr>
	<td> 
	Select Gender
	</td>
	<td>
	<select id="gender" name="gender" class="form-control">
	<option value="female">Bride</option>
	<option value="male">Groom</option>
	</select>
	</td>
	</tr>
	<tr>
	<td style="border:0px;background-color:#FFFFFF;"> 
	Age
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<input type="text" class="form-control" name="min_age" id="min_age">
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<input type="text" class="form-control" name="max_age" id="max_age">
	</td>
	</tr>
	
	<tr>
	<td style="border:0px;background-color:#FFFFFF;"> 
	Registration Date
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<input type="date" class="form-control" name="from_date" id="from_date">
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<input type="date" class="form-control" name="to_date" id="to_date">
	</td>
	</tr>
	
	<tr>
	<td style="border:0px;background-color:#FFFFFF;"> 
	Caste
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<select class="form-control" data-validetta="required" name="caste" id="caste">
     <option value="">Select Your Caste</option>                                   	
	<option value="24 manai telugu chettiar">24 Manai Telugu Chettiar</option>             
	<option value="aaru nattu vellala">Aaru Nattu Vellala</option>             
	<option value="achirapakkam chettiar">Achirapakkam Chettiar</option>             
	<option value="adi dravidar">Adi Dravidar</option>             
	<option value="agamudayar/arcot/thuluva vellala">Agamudayar/Arcot/Thuluva Vellala</option>             
	<option value="agaran vellan chettiar">Agaran Vellan Chettiar</option>             
	<option value="ahirwar">Ahirwar</option>             
	<option value="arunthathiyar">Arunthathiyar</option>             
	<option value="ayira vysya">Ayira Vysya</option>             
	<option value="badaga">Badaga</option>             
	<option value="bairwa">Bairwa</option>             
	<option value="balai">Balai</option>             
	<option value="beri chettiar">Beri Chettiar</option>             
	<option value="boyar">Boyar</option>             
	<option value="brahmin - anaviln desai">Brahmin - Anaviln Desai</option>             
	<option value="brahmin - baidhiki/vaidhiki">Brahmin - Baidhiki/Vaidhiki</option>             
	<option value="brahmin - bardai">Brahmin - Bardai</option>             
	<option value="brahmin - bhargav">Brahmin - Bhargav</option>             
	<option value="brahmin - gurukkal">Brahmin - Gurukkal</option>             
	<option value="brahmin - iyengar">Brahmin - Iyengar</option>             
	<option value="brahmin - iyer">Brahmin - Iyer</option>             
	<option value="brahmin - khadayata">Brahmin - Khadayata</option>             
	<option value="brahmin - khedaval">Brahmin - Khedaval</option>             
	<option value="brahmin - mevada">Brahmin - Mevada</option>             
	<option value="brahmin - rajgor">Brahmin - Rajgor</option>             
	<option value="brahmin - rarhi/radhi">Brahmin - Rarhi/Radhi</option>             
	<option value="brahmin - sarua">Brahmin - Sarua</option>             
	<option value="brahmin - shri gaud">Brahmin - Shri Gaud</option>             
	<option value="brahmin - tapodhan">Brahmin - Tapodhan</option>             
	<option value="brahmin - valam">Brahmin - Valam</option>             
	<option value="brahmin - zalora">Brahmin - Zalora</option>             
	<option value="brahmin - sri vaishnava">Brahmin - Sri Vaishnava</option>             
	<option value="brahmin - cherakula vellalar">Brahmin - Cherakula Vellalar</option>             
	<option value="brahmin - chettiar">Brahmin - Chettiar</option>             
	<option value="brahmin - desikar">Brahmin - Desikar</option>             
	<option value="brahmin - desikar tanjavur">Brahmin - Desikar Tanjavur</option>             
	<option value="brahmin - devandra kula vellalar">Brahmin - Devandra Kula Vellalar</option>             
	<option value="brahmin - devanga chettiar">Brahmin - Devanga Chettiar</option>             
	<option value="brahmin - devar/thevar/mukkulathor">Brahmin - Devar/Thevar/Mukkulathor</option>             
	<option value="brahmin - dhanak">Brahmin - Dhanak</option>             
	<option value="elur chetty">Elur Chetty</option>             
	<option value="gandla/ganiga">Gandla/Ganiga</option>             
	<option value="gounder">Gounder</option>             
	<option value="gounder - kongu - vellala gounder">Gounder - Kongu - Vellala Gounder</option>             
	<option value="gounder - nattu gounder">Gounder - Nattu Gounder</option>             
	<option value="gounder - others">Gounder - Others</option>             
	<option value="gounder - uralii gounder">Gounder - Uralii Gounder</option>             
	<option value="gounder - vanniya kula kshatriyar">Gounder - Vanniya Kula Kshatriyar</option>             
	<option value="gounder - vettuva gounder">Gounder - Vettuva Gounder</option>             
	<option value="gramani">Gramani</option>             
	<option value="gurukkal brahmin">Gurukkal Brahmin</option>             
	<option value="illaththu pillai">Illaththu Pillai</option>             
	<option value="intercaste">Intercaste</option>             
	<option value="isai vellalar">Isai Vellalar</option>             
	<option value="iyenga brahmin">Iyenga Brahmin</option>             
	<option value="iyer brahmin">Iyer Brahmin</option>             
	<option value="julaha">Julaha</option>             
	<option value="kamma naidu">Kamma Naidu</option>             
	<option value="kanaka padanna">Kanaka Padanna</option>             
	<option value="kandara">Kandara</option>             
	<option value="karkathar">Karkathar</option>             
	<option value="karuneegar">Karuneegar</option>             
	<option value="kasukara">Kasukara</option>             
	<option value="kerala mudali">Kerala Mudali</option>             
	<option value="khatik">Khatik</option>             
	<option value="kodikal pillai">Kodikal Pillai</option>             
	<option value="kongu chettiar">Kongu Chettiar</option>             
	<option value="kongu nadar">Kongu Nadar</option>             
	<option value="kongu vellala gounder">Kongu Vellala Gounder</option>             
	<option value="kori/koli">Kori/Koli</option>             
	<option value="krishnavaka">Krishnavaka</option>             
	<option value="kshatriya raju">Kshatriya Raju</option>             
	<option value="kulalar">Kulalar</option>             
	<option value="kuravan">Kuravan</option>             
	<option value="kuruhini chetty">Kuruhini Chetty</option>             
	<option value="kurumbar">Kurumbar</option>             
	<option value="kuruva">Kuruva</option>             
	<option value="manja pudhu chettiar">Manja Pudhu Chettiar</option>             
	<option value="mannan/velan/vannan">Mannan/Velan/Vannan</option>             
	<option value="maruthuvar">Maruthuvar</option>             
	<option value="meenavar">Meenavar</option>             
	<option value="meghwal">Meghwal</option>             
	<option value="mudaliyar">Mudaliyar</option>             
	<option value="mukkulathor">Mukkulathor</option>             
	<option value="muthuraja">Muthuraja</option>             
	<option value="nadar">Nadar</option>             
	<option value="naicker">Naicker</option>             
	<option value="naicker - others">Naicker - Others</option>             
	<option value="naicker - vanniya kula">Naicker - Vanniya Kula</option>             
	<option value="naicker - kshatriyar">Naicker - Kshatriyar</option>             
	<option value="naidu">Naidu</option>             
	<option value="nanjil mudali">Nanjil Mudali</option>             
	<option value="nanjil nattu vellalar">Nanjil Nattu Vellalar</option>             
	<option value="nanjil vellalar">Nanjil Vellalar</option>             
	<option value="nanjil pillai">Nanjil Pillai</option>             
	<option value="nankudi vellalar">Nankudi Vellalar</option>             
	<option value="nattu gounder">Nattu Gounder</option>             
	<option value="nattukudi chettiar">Nattukudi Chettiar</option>             
	<option value="othuvaar">Othuvaar</option>             
	<option value="padanashali">Padanashali</option>             
	<option value="pallan/devandrakula vellalar">Pallan/Devandrakula Vellalar</option>             
	<option value="panan">Panan</option>             
	<option value="pandaram">Pandaram</option>             
	<option value="pandiya vellalar">Pandiya Vellalar</option>             
	<option value="pannirandam chettiar">Pannirandam Chettiar</option>             
	<option value="paravan/bharatar">Paravan/Bharatar</option>             
	<option value="parkavakulam/udayar">Parkavakulam/Udayar</option>             
	<option value="pattinavar">Pattinavar</option>             
	<option value="pattusali">Pattusali</option>             
	<option value="pillai">Pillai</option>             
	<option value="poundra">Poundra</option>             
	<option value="pulaya/cheruman">Pulaya/Cheruman</option>             
	<option value="reddy">Reddy</option>             
	<option value="rohit/chamar">Rohit/Chamar</option>             
	<option value="sc">SC</option>             
	<option value="st">ST</option>             
	<option value="sadhu chetty">Sadhu Chetty</option>             
	<option value="saiva pillai thanjavar">Saiva Pillai Thanjavar</option>             
	<option value="saiva pillai tirunelveli">Saiva Pillai Tirunelveli</option>             
	<option value="saiva velllan chettiar">Saiva Velllan Chettiar</option>             
	<option value="samagar">Samagar</option>             
	<option value="sambava">Sambava</option>             
	<option value="satnami">Satnami</option>             
	<option value="senai thalaivar">Senai Thalaivar</option>             
	<option value="senguntha mudaliyar">Senguntha Mudaliyar</option>             
	<option value="sengunthar/kaikolar">Sengunthar/Kaikolar</option>             
	<option value="shilpkar">Shilpkar</option>             
	<option value="sonkar">Sonkar</option>             
	<option value="sourashtra">Sourashtra</option>             
	<option value="sozhia chetty">Sozhia Chetty</option>             
	<option value="sozhia vellalar">Sozhia Vellalar</option>             
	<option value="telugupatti">Telugupatti</option>             
	<option value="thandan">Thandan</option>             
	<option value="thondai mandala vellalar">Thondai Mandala Vellalar</option>             
	<option value="urali gounder">Urali Gounder</option>             
	<option value="vadambar">Vadambar</option>             
	<option value="vadugan">Vadugan</option>             
	<option value="vaniya chettiar">Vaniya Chettiar</option>             
	<option value="vannar">Vannar</option>             
	<option value="vannia kula kshatriyar">Vannia Kula Kshatriyar</option>             
	<option value="veera saivm">Veera Saivm</option>             
	<option value="veerakodi vellalar">Veerakodi Vellalar</option>             
	<option value="vellalar">Vellalar</option>             
	<option value="vellan chettiars">Vellan Chettiars</option>             
	<option value="vettuva gounder">Vettuva Gounder</option>             
	<option value="vishwakarma">Vishwakarma</option>             
	<option value="vokkaliga">Vokkaliga</option>             
	<option value="yadav">Yadav</option>             
	<option value="yadava naidu">Yadava Naidu</option>             
	<option value="christan -anglo - indian">Christan -Anglo - Indian</option>             
	<option value="christan -born again">Christan -Born Again</option>             
	<option value="christan -born again">Christan -Born Again</option>             
	<option value="christan -church of south india">Christan -Church Of South India</option>             
	<option value="christan -evangelist">Christan -Evangelist</option>             
	<option value="christan -jacobite">Christan -Jacobite</option>             
	<option value="christan -latin catholic">Christan -Latin Catholic</option>             
	<option value="christan -malankara catholic">Christan -Malankara Catholic</option>             
	<option value="christan -pentecost">Christan -Pentecost</option>             
	<option value="christan -roman - catholic">Christan -Roman - Catholic</option>             
	<option value="christan -seventh - day - adventist">Christan -Seventh - day - Adventist</option>             
	<option value="christan -syiran catholic">Christan -Syiran Catholic</option>             
	<option value="christan -syiran jacobite">Christan -Syiran Jacobite</option>             
	<option value="christan -syro malabar">Christan -Syro Malabar</option>             
	<option value="christan -christan - others">Christan -Christan - Others</option>             
	<option value="muslim - ansari">Muslim - Ansari</option>             
	<option value="muslim - arain">Muslim - Arain</option>             
	<option value="muslim - awan">Muslim - Awan</option>             
	<option value="muslim - bohra">Muslim - Bohra</option>             
	<option value="muslim - dekkani">Muslim - Dekkani</option>             
	<option value="muslim - dudekula">Muslim - Dudekula</option>             
	<option value="muslim - hanafi">Muslim - Hanafi</option>             
	<option value="muslim - jat">Muslim - Jat</option>             
	<option value="muslim - khoja">Muslim - Khoja</option>             
	<option value="muslim - lebbai">Muslim - Lebbai</option>             
	<option value="muslim - malik">Muslim - Malik</option>             
	<option value="muslim - mapila">Muslim - Mapila</option>             
	<option value="muslim - maraicar">Muslim - Maraicar</option>             
	<option value="muslim - memon">Muslim - Memon</option>             
	<option value="muslim - mughal">Muslim - Mughal</option>             
	<option value="muslim - pathan">Muslim - Pathan</option>             
	<option value="muslim - qureshi">Muslim - Qureshi</option>             
	<option value="muslim - mapila">Muslim - Mapila</option>             
	<option value="don\'t wish to specify">Don\'t Wish to Specify</option>             
	<option value="others">Others</option>             

	</select>
	</td>
	</tr>
	
	<tr>
	<td style="border:0px;background-color:#FFFFFF;"> 
	Sub caste
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<input type="text" class="form-control" name="sub_caste" id="sub_caste" />
	</td>
	</tr>
	
	<tr>
	<td style="border:0px;background-color:#FFFFFF;"> 
	Country
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<select class="form-control" name="country" id="country" data-validetta="required">
	<option value="">Select Your Country</option>
	<option value="indian" >Indian</option>
	<option value="sri lankan" >Sri Lankan</option>
	<option value="russian" >Russian</option>
	<option value="american" >American</option>
	<option value="pakistanian" >Pakistanian</option>
	<option value="british" >British</option>
	<option value="irish" >Irish</option>
	<option value="brazilian" >Brazilian</option>
	<option value="italian" >Italian</option>
	<option value="chinese" >Chinese</option>
	<option value="polish" >Polish</option>
	<option value="austrian" >Austrian</option>
	<option value="canadian" >Canadian</option>
	<option value="malaysian" >Malaysian</option>
	<option value="south Korean" >South Korean</option>
	<option value="north korean" >North Korean</option>
	<option value="german" >German</option>
	<option value="swedish" >Swedish</option>
	<option value="french" >French</option>
	<option value="swiss" >Swiss</option>
	<option value="others" >Others</option>
	</select>
	</td>
	</tr>
	
	<tr>
	<td style="border:0px;background-color:#FFFFFF;"> 
	Home City
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<input type="text" class="form-control" data-validetta="required" name="home_city" id="home_city">
	</td>
	</tr>
	
	<tr>
	<td style="border:0px;background-color:#FFFFFF;"> 
	User Id
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<input type="text" class="form-control" data-validetta="required" name="user_id" id="user_id">
	</td>
	</tr>
	
	<tr>
	<td style="border:0px;background-color:#FFFFFF;"> 
	Mobile Number
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<input type="text" class="form-control" data-validetta="required" name="mobile_number" id="mobile_number">
	</td>
	</tr>
	
	<tr>
	<td style="border:0px;background-color:#FFFFFF;"> 
	Education
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<select class="chosen-select form-control" name="education" id="education" data-validetta="required" data-placeholder="Select Education">
   <option value=""> Select Education </option>                                     
  <option value="b.arch" >B.ARCH</option>
  <option value="bca" >BCA</option>
  <option value="be" >BE</option>
  <option value="b.plan" >B.PLAN</option>
  <option value="b.sc it/computer science" >B.sc IT/Computer science</option>
  <option value="b.tech" >B.TECH</option>
  <option value="m.arch" >M.ARCH</option>
  <option value="mca" >MCA</option>
  <option value="me" >ME</option>
  <option value="m.sc it/ computer science" >M.sc IT/ Computer science</option>
  <option value="m.s (engg)" >M.S (ENGG)</option>
  <option value="m.tech" >M.TECH</option>
  <option value="pgdca" >PGDCA</option>
  <option value="b.a" >B.A</option>
  <option value="b.com" >B.Com</option>
  <option value="b.ed" >B.Ed</option>
  <option value="bfa" >BFA</option>
  <option value="bft" >BFT</option>
  <option value="blis" >BLIS</option>
  <option value="bmm" >BMM</option>
  <option value="b.sc" >B.Sc</option>
  <option value="b.s.w" >B.S.W</option>
  <option value="b.phil" >B.PHIL</option>
  <option value="m.a" >M.A</option>
  <option value="m.com" >M.Com</option>
  <option value="m.ed" >M.Ed</option>
  <option value="mfa" >MFA</option>
  <option value="mlis" >MLIS</option>
  <option value="m.sc" >M.Sc</option>
  <option value="msw" >MSW</option>
  <option value="m.phil" >M.Phil</option>
  <option value="bba" >BBA</option>
  <option value="bfm" >BFM</option>
  <option value="bhm" >BHM</option>
  <option value="mba" >MBA</option>
  <option value="mfm" >MFM</option>
  <option value="mhm" >MHM</option>
  <option value="mhrm" >MHRM</option>
  <option value="bca" >BCA</option>
  <option value="pgdm" >PGDM</option>
  <option value="b.a.m.s" >B.A.M.S</option>
  <option value="bds" >BDS</option>
  <option value="bhms" >BHMS</option>
  <option value="bsms" >BSMS</option>
  <option value="b.pharm" >B.PHARM</option>
  <option value="bpt" >BPT</option>
  <option value="bhms" >BUMS</option>
  <option value="bvsc" >BVSC</option>
  <option value="mbbs" >MBBS</option>
  <option value="b.sc (nursing)" >B.SC (Nursing)</option>
  <option value="mds" >MDS</option>
  <option value="md/ms (medical)" >MD/MS (MEDICAL)</option>
  <option value="m.pharm" >M.Pharm</option>
  <option value="mpt" >MPT</option>
  <option value="mvsc" >MVSC</option>
  <option value="bgl" >BGL</option>
  <option value="b.l" >B.L</option>
  <option value="llb" >LLB</option>
  <option value="l.l.m" >L.L.M</option>
  <option value="m.l" >M.L</option>
  <option value="ca" >CA</option>
  <option value="cfa" >CFA</option>
  <option value="cs" >CS</option>
  <option value="icwa" >ICWA</option>
  <option value="ias" >IAS</option>
  <option value="ies" >IES</option>
  <option value="ifs" >IFS</option>
  <option value="irs" >IRS</option>
  <option value="ips" >IPS</option>
  <option value="ph.d" >Ph.d</option>
  <option value="diploma" >Diploma</option>
  <option value="polytechnic" >Polytechnic</option>
  <option value="trade school" >Trade school</option>
  <option value="higher secondary school/high school" >Higher secondary school/High school</option>
  <option value="others" >Others</option>
</select>
	</td>
	</tr>
	
	<tr>
	<td style="border:0px;background-color:#FFFFFF;"> 
	Occupation
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<select class="form-control" name="occupation" id="occupation" data-validetta="required">
	<option value=""> Select Occupation </option>
	 <option value="admin" >Admin</option>
	 <option value="supervisor" >Supervisor</option>
	 <option value="manager" >Manager</option>
	 <option value="officer" >Officer</option>
	 <option value="administrative professional" >Administrative Professional</option>
	 <option value="executive" >Executive</option>
	 <option value="clerk" >Clerk</option>
	 <option value="human resources professional" >Human Resources Professional</option>
	 <option value="agriculture" >Agriculture</option>
	 <option value="agriculture and farming professional" >Agriculture and farming professional</option>
	 <option value="airline" >Airline</option>
	 <option value="pilot" >Pilot</option>
	 <option value="air hostess" >Air Hostess</option>
	 <option value="airline professionals" >Airline Professionals</option>
	 <option value="architech and design" >Architech and Design</option>
	 <option value="architect" >Architect</option>
	 <option value="interior designer" >Interior Designer</option>
	 <option value="banking and finance" >Banking and finance</option>
	 <option value="chartered accountant" >Chartered accountant</option>
	 <option value="company secretary" >Company Secretary</option>
	 <option value="accounts/financial professional" >Accounts/financial professional</option>
	 <option value="auditor" >Auditor</option>
	 <option value="financial analyst /planning" >Financial analyst /planning</option>
	 <option value="beauty and fashion" >Beauty and Fashion</option>
	 <option value="fashion designer" >Fashion Designer</option>
	 <option value="beautician" >Beautician</option>
	 <option value="civil service(ias/ips/irs/ies/ifs)" >Civil service(IAS/IPS/IRS/IES/IFS)</option>
	 <option value="defense" >Defense</option>
	 <option value="army" >Army</option>
	 <option value="navy" >Navy</option>
	 <option value="air force" >Air Force</option>
	 <option value="education" >Education</option>
	 <option value="professor/lecturer" >Professor/Lecturer</option>
	 <option value="education professional" >Education professional</option>
	 <option value="hospitality" >Hospitality</option>
	 <option value="hotel/hospitality professional" >Hotel/Hospitality Professional</option>
	 <option value="it and engineering" >IT and Engineering</option>
	 <option value="software professional" >Software professional</option>
	 <option value="hardware professional" >Hardware professional</option>
	 <option value="engineer non it" >Engineer Non IT</option>
	 <option value="designer" >Designer</option>
	 <option value="legal" >Legal</option>
	 <option value="lawyer and legal professional" >Lawyer and Legal Professional</option>
	 <option value="medical" >Medical</option>
	 <option value="doctor" >Doctor</option>
	 <option value="health care professional" >Health care professional</option>
	 <option value="paramedical professional" >Paramedical professional</option>
	 <option value="nurse" >Nurse</option>
	 <option value="marketing professional" >Marketing professional</option>
	 <option value="sales professional" >Sales professional</option>
	 <option value="journalist" >Journalist</option>
	 <option value="media professional" >Media professional</option>
	 <option value="entertainment professional" >Entertainment professional</option>
	 <option value="event management professional" >Event management professional</option>
	 <option value="advertising/pr professional" >Advertising/PR professional</option>
	 <option value="mariner/merchant navy" >Mariner/merchant navy</option>
	 <option value="scientist" >Scientist</option>
	 <option value="scientist research" >Scientist Research</option>
	 <option value="cxo\\president,director,chairman" >CXO\\President,Director,Chairman</option>
	 <option value="business analyst" >Business Analyst</option>
	 <option value="consultant" >Consultant</option>
	 <option value="customer care professional" >Customer care professional</option>
	 <option value="social worker" >Social worker</option>
	 <option value="sportsman" >Sportsman</option>
	 <option value="technician" >Technician</option>
	 <option value="arts and craftsman" >Arts and Craftsman</option>
	 <option value="librarian" >Librarian</option>
	 <option value="business  owner/entrepreneur." >Business  Owner/Entrepreneur.</option>
	 <option value="others" >Others</option>
		 </select>
	</td>
	</tr>
	<tr>
	<td style="border:0px;background-color:#FFFFFF;"> 
	Rassi
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<select class="form-control" name="raasi" id="raasi">
	<option value="" >Select Raasi</option>
	<option value="aries" >Aries</option>
	<option value="taurus" >Taurus</option>
	<option value="gemini" >Gemini</option>
	<option value="cancer" >Cancer</option>
	<option value="leo" >Leo</option>
	<option value="virgo" >Virgo</option>
	<option value="libra" >Libra</option>
	<option value="scorpio" >Scorpio</option>
	<option value="sagittarius" >Sagittarius</option>
	<option value="capricorn" >Capricorn</option>
	<option value="aquarius" >Aquarius</option>
	<option value="pisces" >Pisces</option>
	<option value="others" >Others</option>
		</select>
	</td>
	</tr>
	
	<tr>
	<td style="border:0px;background-color:#FFFFFF;"> 
	Star
	</td>
	<td style="border:0px;background-color:#FFFFFF;">
	<select class="form-control"  name="star" id="star">
   <option value="">Does not matter</option>
	<option value="anusham" >ANUSHAM</option>
	<option value="aswini" >ASWINI</option>
	<option value="avittam" >AVITTAM</option>
	<option value="ayilyam" >AYILYAM</option>
	<option value="bharani" >BHARANI</option>
	<option value="chithirai" >CHITHIRAI</option>
	<option value="hastham" >HASTHAM</option>
	<option value="kettai" >KETTAI</option>
	<option value="krithigai" >KRITHIGAI</option>
	<option value="maham" >MAHAM</option>
	<option value="moolam" >MOOLAM</option>
	<option value="mrigasirisham" >MRIGASIRISHAM</option>
	<option value="poosam" >POOSAM</option>
	<option value="punarpusam" >PUNARPUSAM</option>
	<option value="puradam" >PURADAM</option>
	<option value="puram" >PURAM</option>
	<option value="puratathi" >PURATATHI</option>
	<option value="revathi" >REVATHI</option>
	<option value="rohini" >ROHINI</option>
	<option value="sadayam" >SADAYAM</option>
	<option value="swathi" >SWATHI</option>
	<option value="thiruvadirai" >THIRUVADIRAI</option>
	<option value="thiruvonam" >THIRUVONAM</option>
	<option value="uthradam" >UTHRADAM</option>
	<option value="uthram" >UTHRAM</option>
	<option value="uthratadhi" >UTHRATADHI</option>
	<option value="visakam" >VISAKAM</option> 	
		
	</select>
	</td>
	</tr>
	</table>