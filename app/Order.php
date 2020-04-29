<?php

namespace App;

use App\Billing;
use App\Transaction;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = [
        'user_id',
        'order_code',
        'shipping_id',
        'billing_id',
        'email',
        'items',
        'receipt_url',
        'shipping_info',
        'billing_info',
        'status',
        'quantity',
        'subtotal',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function shipping()
    {
        return $this->belongsTo(\App\Shipping::class);
    }

    public function billing()
    {
        return $this->belongsTo(\App\Billing::class);
    }

    

    //pulling shipping info from other table
    public static function orderShipping($order_id){
        $order =Order::where('id', $order_id)->first();
       //check if shipping id is empty( is shiiping Id is empty then pull the serialized shipping
       //info from the other table )
        if(empty($order->shipping_id))
        $order =unserialize($order->shipping_info);
        else
        $order =Shipping::where('id', $order->shipping_id)->first();;

    $order=(object) $order;

    // return $order;
      return collect([
          'id'=>$order->id,
            'user_id'=>$order->user_id,
            'first_name' =>  $order->first_name,
            'last_name' => $order->last_name,
            'email' => $order->email,
            'address' => $order->address,
            'state' => $order->state,
            'phone_number' => $order->phone_number,
            'shipping_method' => $order->shipping_method,
        ]);

    }

    public static function orderBilling($order_id){
        $order =Order::where('id', $order_id)->first();

        if(empty($order->billing_id))
        $order =unserialize($order->billing_info);
        else
        $order =Billing::where('id', $order->billing_id)->first();;

    $order=(object) $order;

//  return $order;

      return collect([
        'id'=>$order->id,
            'user_id'=>$order->user_id,
            'first_name' =>  $order->first_name,
            'last_name' => $order->last_name,
            'email' => $order->email,
            'address' => $order->address,
            'state' => $order->state,
            'phone_number' => $order->phone_number,

        ]);

    }

    public static function orderProduct($order_id){
        $order =Order::where('id', $order_id)->first();
    $order =unserialize($order->items);

    return $order;
    }

    public function trans()
    {
          return $this->hasOne(Transaction::class, 'email', 'email_address');
    }

}
