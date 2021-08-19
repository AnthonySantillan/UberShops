import { PaymentModule } from "../modules/payment/payment.module";
import { ProductModel } from "./product.model";

export interface DetailModel{
    id?:number;
    product?:ProductModel;
    payment?:PaymentModule;
    amount?:number;
    deliveryDate?:Date;
    deliveryTime?:string;
    value?:number;
}