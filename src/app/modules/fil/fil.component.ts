import { HttpClient } from '@angular/common/http';
import { Component } from '@angular/core';
import { Sort } from '@angular/material/sort';
import { IFIL } from 'src/app/shared/models/fil.model';
import { sortData } from 'src/app/static/functions/sort.function';
import { environment } from 'src/environments/environment';

@Component({
  selector: 'app-fil',
  templateUrl: './fil.component.html',
  styleUrls: ['./fil.component.css']
})
export class FilComponent {

  private _fil: Array<IFIL> = [];
  private _baseFil: Array<IFIL> = [];

  constructor(
    private _http: HttpClient,
  ) {
    // Get the FIL
    this._http.get<Array<IFIL>>(environment.backendUri + '/fil').subscribe(
      (fil: Array<IFIL>) => {
        this._fil = fil;
        this._baseFil = this._fil.slice();
      }
    );
  }

  /**
   * Get the fil entries
   */
  public get fil() : Array<IFIL> {
    return this._fil;
  }

  /**
   * Check if the given quest passes the current feature
   *
   * @param spell quest to check
   * @returns     filter pass status
   */
  checkFilter(quest: IFIL): boolean {
    return true;
    // return this._spellFilterService.checkSpellFilter(spell, this.filter);
  }

    /**
   * Sort the spells array based on the column
   *
   * @param sort  Material sort object
   */
  sortData(sort: Sort): void {
    this._fil = sortData<IFIL>(sort, this._baseFil);
  }

}
