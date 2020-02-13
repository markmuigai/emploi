<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use App\Seeker;

class ProductOrder extends Model
{
    protected $fillable = [
        'order_id', 'product_id','days_duration','start_date','price','contents'
    ];

    public function order(){
    	return $this->belongsTo(Order::class);
    }

    public function product(){
    	return $this->belongsTo(Product::class);
    }

    public static function toggle($productOrder, $action = 'activate')
    {
    	$p = $productOrder;
    	$slug = $p->product->slug;
    	$today = now();

    	if($slug == 'featured_seeker' || $slug == 'entry_level_cv_edit' || $slug == 'mid_level_cv_edit' || $slug == 'c_change_cv_edit' || $slug == 's_mgnt_cv_edit' || $slug == 'mgnt_cv_edit' )
    	{
    		if($action == 'activate')
        	{
        		$p->contents = now()->add($p->days_duration,'day');
            	$p->save();
        	}
        	else
        	{
        		$expiry = new Carbon($productOrder->contents);
        		if($today->diff($expiry)->days <= 0)
        		{
        			$p->contents = 'completed';
        			$p->save();
        			Seeker::disableFeaturedUserByUserId($p->order->user_id);
        			//check if user should remain featured
        				//disable if they have no other products marking them featured
        		}
        		
        	}
    	}
    	if($slug == 'seeker_basic')
    	{
    		if($action == 'activate')
        	{
        		$p->contents = now()->add($p->days_duration,'day');
            	$p->save();
        	}
        	else
        	{
        		$expiry = new Carbon($productOrder->contents);
        		if($today->diff($expiry)->days <= 0)
        		{
        			$p->contents = 'completed';
        			$p->save();
        		}
        	}

    	}

    	if($slug == 'solo')
    	{
    		if($action == 'activate')
        	{
        		$p->contents = 1;
        		$p->save();
        	}
        	else
        	{
        		if( (int) $p->contents == 0 )
        		{
        			$p->contents = 'completed';
        			$p->save();
        		}
        	}

    	}

    	if($slug == 'stawi')
    	{
    		if($action == 'activate')
        	{
        		$p->contents = 1;
        		$p->save();
        	}
        	else
        	{
        		if( (int) $p->contents == 0 )
        		{
        			$p->contents = 'completed';
        			$p->save();
        		}
        	}

    	}

    	if($slug == 'solo-plus')
    	{
    		if($action == 'activate')
        	{
        		$p->contents = 4;
        		$p->save();
        	}
        	else
        	{
        		if( (int) $p->contents == 0 )
        		{
        			$p->contents = 'completed';
        			$p->save();
        		}
        	}

    	}

    	if($slug == 'infinity')
    	{
    		if($action == 'activate')
        	{
        		$p->contents = now()->add($p->days_duration,'day');
            	$p->save();
        	}
        	else
        	{
        		$expiry = new Carbon($productOrder->contents);
        		if($today->diff($expiry)->days <= 0)
        		{
        			$p->contents = 'completed';
        			$p->save();
        		}
        	}

    	}
    }

    public static function deactivateExpired()
    {
    	$ps = ProductOrder::where('contents','!=',null)->where('contents','not like','completed')->get();
    	for($i=0; $i<count($ps); $i++)
    		ProductOrder::toggle($ps[$i],'deactivate');
    }
}
