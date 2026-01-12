export const STORAGE_KEYS = {
    DRAFT_PREFIX: 'draft',
    CATEGORY_SUFFIX: 'category',
    TITLE_SUFFIX: 'title',
    TIMESTAMP_SUFFIX: 'timestamp',
};

export const SETTINGS = {
    MAX_DRAFT_AGE_MS: 7 * 24 * 60 * 60 * 1000, // 7 days
    MAX_STORAGE_SIZE: 4.5 * 1024 * 1024, // 4.5MB
    SAVE_DEBOUNCE_MS: 1000,
};

export const MESSAGES = {
    DRAFT_SAVED: 'Draft saved',
    DRAFT_RESTORED: 'Restored from draft',
    DRAFT_TOO_LARGE: 'Draft too large',
    STORAGE_FULL: 'Storage full',
    DISCARD_CONFIRM: 'Are you sure you want to discard this draft?',
};
