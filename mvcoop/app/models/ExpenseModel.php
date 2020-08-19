<?php
		class ExpenseModel{
			private $id;
			private $category_id;
			private $qty;
			private $amount;
			private $date;
			private $user_id;

			public function setId($id)
			{
				$this->id=$id;
			}
			public function getId()
			{
				return $this->id;
			}
			public function setCategory($category_id)
			{
				$this->category_id=$category_id;
			}
			public function getCategory()
			{
				return $this->category_id;
			}
			public function setQty($qty)
			{
				$this->qty=$qty;
			}
			public function getQty()
			{
				return $this->qty;
			}
			public function setAmount($amount)
			{
				$this->amount=$amount;
			}
			public function getAmount()
			{
				return $this->amount;
			}
			public function setDate($date)
			{
				$this->date=$date;
			}
			public function getDate()
			{
				return $this->date;
			}
			public function setUser($user_id)
			{
				$this->user_id=$user_id;
			}
			public function getUser()
			{
				return $this->user_id;
			}

			public function toArray(){
			return[

					"id"			=>$this->getId(),
					"category_id"	=>$this->getCategory(),
					"qty"			=>$this->getQty(),
					"amount"		=>$this->getAmount(),
					"date"			=>$this->getDate(),
					"user_id"		=>$this->getUser(),
				];
			}
		}

		
?>