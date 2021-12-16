import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { UserService } from 'src/app/modules/user/services/user.service';
import { ObservableService } from '../../services/observable.service';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css'],
  providers: [ ObservableService ]
})
export class HeaderComponent {

  navCollapsed: boolean;
  loggedIn: boolean;

  constructor(
    private _observableService: ObservableService,
    private _userService: UserService,
    private _router: Router,
  ) {
    this.navCollapsed = true;
    this.loggedIn = this._userService.userInfo ? true : false;

    // Listen for changes in user login state
    this._observableService.subscribe(
      this._userService.loginUpdate,
      (state: boolean) => this.loggedIn = state
    );
  }

  /**
   * Navigate and close the menu bar
   *
   * @param route path string
   */
  navigate(route: string): void {
    this.navCollapsed = true;
    this._router.navigate([route]);
  }

  /**
   * Trigger a user logout event
   */
  logout(): void {
    this.navCollapsed = true;
    this._userService.logout();
  }

}
