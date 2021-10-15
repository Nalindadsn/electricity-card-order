<?php 

Class Dropdown
{
	private $host = 'localhost';
	private $username = 'root';
	private $password = '';
	private $dbname = 'ceb';
	private $connection;

	//establish connection
	public function __construct()
	{
		try 
		{
			$this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbname);
		} 
		catch (Exception $e) 
		{
			echo "Connection error " . $e->getMessage();
		}
	}

	
	//fetch all country records from database
	public function fetchOne()
	{
		$data = null;

		$query = "SELECT * FROM tone";

		if ($sql = $this->connection->query($query)) 
		{
			while ($rows = mysqli_fetch_assoc($sql)) 
			{
				$data[] = $rows;
			}
		}

		return $data;
	}
	
	//fetch state records from database depend upon country id
	public function fetchTwo($tone_id)
	{
		$data = null;

		$query = "SELECT * FROM ttwo WHERE tone_id='".$tone_id."' ";

		if ($sql = $this->connection->query($query)) 
		{
			while ($rows = mysqli_fetch_assoc($sql)) 
			{
				$data[] = $rows;
			}
		}

		return $data;
	}
	
	//fetch city records from database depend upon state id
	public function fetchThree($ttwo_id)
	{
		$data = null;

		$query = "SELECT * FROM tthree WHERE ttwo_id='".$ttwo_id."' ";

		if ($sql = $this->connection->query($query)) 
		{
			while ($rows = mysqli_fetch_assoc($sql)) 
			{
				$data[] = $rows;
			}
		}

		return $data;
	}
	//fetch city records from database depend upon state id
	public function fetchFour($tthree_id)
	{
		$data = null;

		$query = "SELECT * FROM tfour WHERE tthree_id='".$tthree_id."' ";

		if ($sql = $this->connection->query($query)) 
		{
			while ($rows = mysqli_fetch_assoc($sql)) 
			{
				$data[] = $rows;
			}
		}

		return $data;
	}

}

 ?>