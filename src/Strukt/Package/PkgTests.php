<?php

namespace Strukt\Package;

use Strukt\Contract\Package as Pkg;

class PkgTests implements Pkg{

	private $manifest;

	public function __construct(){

		$this->manifest = array(

			"cmd_name"=>"PhpUnit",
			"package"=>"pkg-tests",
			"files"=>array(

				"lib/App/Command/Tests/Exec.php",
				"lib/App/Command/Tests/ListCmd.php"
			)
		);
	}

	public function getSettings($type){

		$settings = array(

			"App:Cli"=>array(

				"commands"=>array(

					\App\Command\Tests\Exec::class,
					\App\Command\Tests\ListCmd::class
				)
			),
			"App:Idx"=>[]
		);

		return $settings[$type];
	}

	public function getName(){

		return $this->manifest["package"];
	}

	public function getCmdName(){

		return $this->manifest["cmd_name"];
	}

	public function getFiles(){

		return $this->manifest["files"];
	}

	public function getModules(){

		return null;
	}

	public function isPublished(){

		return class_exists(\App\Command\Tests\Exec::class);
	}

	public function getRequirements(){

		return null;
	}
}