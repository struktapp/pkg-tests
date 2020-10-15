<?php

namespace Strukt\Package;

use Strukt\Contract\Package as Pkg;

class PkgTests implements Pkg{

	private $manifest;

	public function __construct(){

		$this->manifest = array(

			"package"=>"pkg-tests",
			"files"=>array(

				"lib/App/Command/Tests/Exec.php",
				"lib/App/Command/Tests/ListCmd.php"
			)
		);
	}

	public function getName(){

		return $this->manifest["package"];
	}

	public function getFiles(){

		return $this->manifest["files"];
	}

	public function getModules(){

		return null;
	}

	public function isInstalled(){

		return class_exists(\App\Command\Tests\Exec::class);
	}
}