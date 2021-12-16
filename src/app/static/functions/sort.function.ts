import { Sort } from "@angular/material/sort";

/**
 * Function to compare two objects for equivalence based on the keys of that object
 *
 * @param a     object value
 * @param b     object value
 * @param isAsc sort order
 *
 * @returns     sort precedence
 */
export function compare<T>(a: T[keyof T], b: T[keyof T], isAsc: boolean): number {
  if (typeof a === 'string' && typeof b === 'string') {
    return (a.toLowerCase() < b.toLowerCase() ? -1 : 1) * (isAsc ? 1 : -1);
  }
  return (a < b ? -1 : 1) * (isAsc ? 1 : -1);
}

/**
 * Function to generically sort a data interface by the keys of that data interface
 *
 * @param sort      Material Sort parameters
 * @param baseData  The initial data arrangement (e.g. the default)
 *
 * @returns         A new array of the sorted data
 */
export function sortData<T>(sort: Sort, baseData: Array<T>): Array<T> {
  const dataCopy = baseData.slice();
  if (!sort.active || sort.direction === '') {
    // Update to initial order
    return baseData;
  }
  else {
    // Sort on category
    return dataCopy.sort((a, b) => {
      const isAsc = sort.direction === 'asc';
      return compare<T>(a[sort.active as keyof T], b[sort.active as keyof T], isAsc);
    });
  }
}
