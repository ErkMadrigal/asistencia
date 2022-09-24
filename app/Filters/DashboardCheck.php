<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


class DashboardCheck implements FilterInterface
{
	
	public function before(RequestInterface $request,$arguments = NULL)
	{
		$uri = service('uri');
		if(strtolower($uri->getSegment(1)) == 'dashboard'){
			if($uri->getSegment(2) == '')
				$segment = base_url();
			else
				$segment = base_url().'/'.$uri->getSegment(2);

			return redirect()->to($segment);
		}
	}

	public function after(RequestInterface $request , ResponseInterface $response,$arguments = NULL)
	{
	}
}
