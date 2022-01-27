<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderTrendsController extends Controller
{
    public static function analytics() {
        
        $payment = DB::select(DB::raw("Select count(CASE WHEN O_Payment = 'Cash' then 1 end) as Cash, count(CASE WHEN O_Payment = 'Paypal' then 1 end) as Paypal FROM customer_db.order;"));
        foreach($payment as $row){
            $orderPayment = "[".$row->Cash.", ".$row->Paypal."]";
        }


        $sales = DB::select(DB::raw("SELECT 
        Sum(CASE WHEN MONTH(created_at) = 1 THEN O_Total_Price END) AS January,
        Sum(CASE WHEN MONTH(created_at) = 2 THEN O_Total_Price END) AS February,
        Sum(CASE WHEN MONTH(created_at) = 3 THEN O_Total_Price END) AS March,
        Sum(CASE WHEN MONTH(created_at) = 4 THEN O_Total_Price END) AS April,
        Sum(CASE WHEN MONTH(created_at) = 5 THEN O_Total_Price END) AS May,
        Sum(CASE WHEN MONTH(created_at) = 6 THEN O_Total_Price END) AS June,
        Sum(CASE WHEN MONTH(created_at) = 7 THEN O_Total_Price END) AS July,
        Sum(CASE WHEN MONTH(created_at) = 8 THEN O_Total_Price END) AS August,
        Sum(CASE WHEN MONTH(created_at) = 9 THEN O_Total_Price END) AS September,
        Sum(CASE WHEN MONTH(created_at) = 10 THEN O_Total_Price END) AS October,
        Sum(CASE WHEN MONTH(created_at) = 11 THEN O_Total_Price END) AS November,
        Sum(CASE WHEN MONTH(created_at) = 12 THEN O_Total_Price END) AS 'December'
        from customer_db.order
        "));
        foreach($sales as $row){
            $salesChart = "[".$row->January.", ".$row->February.", ".$row->March.", ".$row->April.", ".$row->May.", ".$row->June.", ".$row->July.", ".$row->August.", ".$row->September.", ".$row->October.", ".$row->November.", ".$row->December."]";

        }

        $popular = DB::select(DB::raw("SELECT product.P_Image, product.P_Name, product.P_Id, SUM(order_product.Order_Quantity) as P_Qty, product.P_Price
        FROM order_product,product
        WHERE order_product.P_Id=product.P_Id
        GROUP BY product.P_Id, product.P_Name, product.P_Price, product.P_Image
        ORDER BY SUM(order_product.Order_Quantity) DESC
        LIMIT 5;"));

        $least = DB::select(DB::raw("SELECT product.P_Image, product.P_Name, product.P_Id, SUM(order_product.Order_Quantity) as P_Qty, product.P_Price
        FROM order_product,product
        WHERE order_product.P_Id=product.P_Id
        GROUP BY product.P_Id, product.P_Name, product.P_Price, product.P_Image
        ORDER BY SUM(order_product.Order_Quantity) ASC
        LIMIT 5;"));
        

    
        // dd($popular);

        return view('reports.order_trends', compact('orderPayment', 'salesChart','popular', 'least'));
    }
}
