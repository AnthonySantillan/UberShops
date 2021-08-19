import { RoleModel } from "./role.model";
import { UserModel } from "./user.model";
import { VehicleModel } from "./vehicle.model";

export interface DriverModel{
    id?:number;
    license?:string;
    user?:UserModel;
    vehicle?:VehicleModel;
    role?:RoleModel;
}