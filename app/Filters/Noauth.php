<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


class Noauth implements FilterInterface
{
	
	public function before(RequestInterface $request,$arguments = NULL)
	{
		if(session()->get('isLoggedIn')){
			return redirect()->to(base_url().'/dash');
		}
	}

	public function after(RequestInterface $request , ResponseInterface $response,$arguments = NULL)
	{
	}
}
