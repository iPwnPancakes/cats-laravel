export interface Cat {
    id: number;
    name: string;
    breeds: Breed[];
}

export interface Breed {
    id: number;
    name: string;
    pivot: {
        percentage: number;
    }
}
