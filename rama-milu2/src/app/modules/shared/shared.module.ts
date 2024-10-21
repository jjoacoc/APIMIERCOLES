import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { NavbarComponent } from './components/navbar/navbar.component';
import { MatToolbarModule } from '@angular/material/toolbar';
import { MatMenuModule } from '@angular/material/menu';
import {MatIconModule} from '@angular/material/icon';
import { MatButtonModule } from '@angular/material/button';



@NgModule({
  declarations: [
    NavbarComponent
  ],
  imports: [
    CommonModule,
    MatToolbarModule,
    MatMenuModule,
    MatIconModule,
    MatButtonModule
  ],
  exports:[
    NavbarComponent
  ]
})
export class SharedModule { }
