<?php

class About extends Controller{

	public function index($nama ="Defult nama",$pekerjaan = "Defoult kerja",
						$umur = 32){ //kalau url hanya ada abuot method ini kan dipanggil
		
		//echo "Halo, $nama dengan kerja $pekerjaan"; //kalau ada about aja akan err, maka setkan defoult value
			$data['nama'] = $nama;
			$data['pekerjaan'] = $pekerjaan;
			$data['umur'] = $umur;
			$data["judul"] = "About Me";

		$this->view('template/header', $data);
		$this->view('about/index', $data);
		$this->view('template/footer');
	}

	public function page(){//kalau lepas abut ada method guna lah method yg ada
		// echo "About/page";

		$data["judul"] = "Pages";
		
		$this->view('template/header', $data);
		$this->view('template/header');
		$this->view('about/page');
		$this->view('template/footer');
	}
}