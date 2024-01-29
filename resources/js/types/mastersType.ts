export type User = {
  id: number;
  name: string;
  email?: string | null;
  email_verified_at?: string | null;
  image?: string | null;
  is_checker: number;
  created_at?: string | null;
  updated_at?: string | null;
};

export type Master = {
  id: number;
  name: string;
};
