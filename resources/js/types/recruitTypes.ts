export type Recruit = {
  id: number;
  name: string;
  name_kana: string;
  email: string;
  birth_date: string;
  post_code: string;
  address: string;
  phone: string;
  positions: string;
  join_date: string;
  source: string;
  free_message: string;
  created_at: string;
  updated_at: string;
  deleted_at: string | null;
};

export type PaginationLink = {
  url: string | null;
  label: string;
  active: boolean;
};

export type MetaInfo = {
  current_page: number;
  from: number;
  last_page: number;
  links: PaginationLink[];
  path: string;
  per_page: number;
  to: number;
  total: number;
};

export type ApiResponse = {
  data: Recruit[];
  links: {
    first: string;
    last: string;
    prev: string | null;
    next: string | null;
  };
  meta: MetaInfo;
  message: string;
};
